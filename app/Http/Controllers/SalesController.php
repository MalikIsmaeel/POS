<?php

namespace App\Http\Controllers;

use App\Models\sales;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\store_dtl;
use App\Models\sales_entity;
use App\Http\Requests\GenerateRequest;
use App\Http\Controllers\SallaController;
use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\Storage;
use PDF;







class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
     private $logo;
    protected $temporary_image_file_name;
    protected $temporary_image_file_path;
    protected $temporary_pdf_file_name;
    protected $base64_image_string;
    protected $base64_image_string_without_header;

    public function __construct()
    {
        $this->middleware('auth');
        $this->logo = 'images/lion_head.png'; // https://www.silhouette.pics/83600/free-lion-head-tattoo-download.php
        $this->temporary_image_file_name = time() . '.png';
        $this->temporary_image_file_path = 'qr_images/' . $this->temporary_image_file_name;
        $this->temporary_pdf_file_name = time() . '.pdf';
    }


    public function index()
    {
  
//    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['numbers']="INV ".(purchase_invoice::get()->last()?->id+1 ?? 1);
        $data['products'] =product::get();
        $data['stores']=store_mstr::get();
        $data['units']=unit::get()->where('active','=','1');
        $data['suppliers']=supplier::get();
        $data['catogeriess']= catogery::where('active','=',1);
        return view('purchase.insert')->with(['data'=>$data]);    //    with('catogeries','suppliers','units','units','stores','numbers','products')->with($catogeries,$supplier,$unit,$store,$number,$product);
    //    dd($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,SallaController $salla)
    {   
      $inv= "INV ".(sales::get()->last()?->id?? 1);
               $cart= session()->get('cart');

              $sales_date=Carbon::now();
             
              $sales=sales::create([
                'invoice_number'=>$inv,
                'invoice_date'=>$sales_date,
                'date_due'=>Carbon::now(),
                'total'=>$request->total,
                'total_vat'=>$request->vat,
                "total_with_vat"=>$request->total_with_vat,      
                'active'=>$request->active ?? 1,
                'user_id'=>Auth::user()->id,
              ]);
              foreach($cart  as $values){
                  
                sales_entity::create($values);
            }
            
            //  dd($cart);
            session()->forget('cart');
            $cart = session()->get('cart', []);


            $qr_data = [
              'seller_name'=>Auth::user()->name,
              'vat_number'=>123456789101112,
              'invoice_date'=>$sales->invoice_date, 
              'total_amount'=>$sales->total_with_vat,
            'vat_amount'=>$sales->vat,
          ];
          
          
          $base64_image = "";
  
          
              $this->base64_image_string = $salla->render($qr_data);
          
                  return $this->pdf_file_with_image();
          
            //  return redirect()->back()->with('success', $inv.' Invoice Added successfully.');
              
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\purchase_invoice  $purchase_invoice
     * @return \Illuminate\Http\Response
     */
    public function show(purchase_invoice $purchase_invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\purchase_invoice  $purchase_invoice
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
 
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\purchase_invoice  $purchase_invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, purchase_invoice $purchase_invoice)
    {

       $qty=$request->qty;
        $purchase_invoice->update([
            'invoice_number'=>$request->invoice_number,
            'invoice_date'=>$request->invoice_date,
            'date_due'=>$request->date_due,
            'total'=>$request->total,
            'total_vat'=>$request->total_vat,
            "total_with_vat"=>$request->total_with_vat,
            'supplier_id'=>$request->supplier_id,
            'active'=>$request->active ?? 1,
            'user_id'=>$request->user_id 
          ]);
          $options_data = [];
                
          foreach ($qty as $key => $value) {
               $options_data['qty']=$request->qty[$key] ;
               $options_data['active']=$request->active;
               $options_data['product_id']=$request->product_id[$key];
               $options_data['store_id']=$request->store_id;
               $options_data['active']=$request->active ?? 1;
               $options_data['unit_id']=$request->unit_id[$key];
               $options_data['cost']=$request->cost[$key] ?? 0;
               $options_data['user_id']=$request->user_id;
            //     'store_id'=>$request->store_id,
               $options_data['invoice_id']=$purchase->id ?? 1;
               $options_data['tax']=$request->tax[$key] ?? 0.15;
               $options_data['sub_total']=$request->sub_total[$key];
            
            invoice_parchase_entity::updateOrcreate($options_data);
          }
          return redirect()->back()->with('success', $request->invoice_number.' Invoice Updated successfully.');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\purchase_invoice  $purchase_invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(purchase_invoice $purchase_invoice)
    {
        
    }
    public function generate(SallaController $salla)
    {
        $sales=sales::get()->last();
        
        
    }
    public function pdf_file_with_image()
    {
        $data = [
            'title' => 'Invoice number: IN-123456789',
            'date' => date('m/d/Y'),
            'qr_image' => $this->image_html($this->base64_image_string),
        ];

        // First method
        // $pdf = \App::make('dompdf.wrapper');
        // $pdf->loadHTML('<h1>Test</h1>');
        // return $pdf->download();

        // Second method
        return View('pdf-with-qr', $data);

        // return $pdf->download($this->temporary_pdf_file_name);
    }

    public function decode_base64($base64_encoded_string)
    {
        $search = array('data:image/png;base64,', ' ');
        $replace = array('', '+');
        $string_without_base64_header = str_replace($search, $replace, $base64_encoded_string);
        $decoded_string = base64_decode($string_without_base64_header);

        return $decoded_string;
    }

    public function image_html($base64_file)
    {
        return '<img style="width: 200px;" src="' . $base64_file . '" alt="QR Code" />';
    }

}
