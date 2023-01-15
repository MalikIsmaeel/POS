<?php

namespace App\Http\Controllers;
use App\Models\unit;
use App\Models\catogery;
use App\Models\invoice_parchase_entity;
use App\Models\purchase_invoice;
use App\Models\supplier;
use App\Models\product;
use App\Models\store_mstr;
use Illuminate\Http\Request;

class InvoiceParchaseEntityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(purchase_invoice $purchase_invoice)
    {
       
       
        $entity=invoice_parchase_entity::paginate(10);
      return  view('purchase.index',['entities'=>$entity,'purchase'=>$purchase_invoice]);
     
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
    //        //  enters for invoice details
             'qty'=>'required',
             'active',
             'product_id'=>'required',
             'store_id'=>'required',
             'cost'=>'required',
             'unit_id'=>'required',
             'user_id'=>'required',
    // //         // enters for invoice maser
         'invoice_number'=>'required|unique:purchase_invoices',
          'invoice_date'=>'required',
           'date_due'=>'required',
           'total'=>'required',
           'sub_total',
           'total_vat'=>'required',
           'total_with_vat'=>'required',
          'supplier_id'=>'required',
            'user_id'=>'required'  
     ]);
        
      $purchase=purchase_invoice::create([
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
      $id=$request->id;
      $qty=$request->qty;
      $active=$request->active ?? 1;
      $product_id=$request->product_id;
      // 'store_id'=>$request->store_id,
      $unit_id=$request->unit_id;
      $cost=$request->cost;
      $user_id=$request->user_id;
    //   $store_id=>$request->store_id,
      $invoice_id=$purchase->id ?? 1;
      $tax=$request->tax ?? 0.15;
      $sub_total=$request->sub_total;
     
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
        
        invoice_parchase_entity::create($options_data);

        
      }



     return redirect()->back()->with('success', $request->invoice_number.' Invoice Added successfully.');
               
       
    }
    //   Book::insert($data);



        // invoice_parchase_entity::create( [
        //     'qty'=>$request->qty ?? 0,
        //     'active'=>$request->active ?? 1,
        //     'product_id'=>$request->product_id,
        //     'store_id'=>$request->store_id,
        //     'unit_id'=>$request->unit_id,
        //     'cost'=>$request->cost ?? 0,
        //     'user_id'=>$request->user_id,
        //     'store_id'=>$request->store_id,
        //     'invoice_id'=>$request->invoice_number,
        //     'tax'=>$request->tax ?? 0.15,
        //     'sub_total'=>$request->sub_total 
        // ]);
    
    //  
            // return redirect()->back()->with('success',$request->invoice_number.' Added successfully.');
          
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\invoice_parchase_entity  $invoice_parchase_entity
     * @return \Illuminate\Http\Response
     */
    public function show(invoice_parchase_entity $invoice_parchase_entity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\invoice_parchase_entity  $invoice_parchase_entity
     * @return \Illuminate\Http\Response
     */
    public function edit(invoice_parchase_entity $invoice_parchase_entity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\invoice_parchase_entity  $invoice_parchase_entity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, invoice_parchase_entity $invoice_parchase_entity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\invoice_parchase_entity  $invoice_parchase_entity
     * @return \Illuminate\Http\Response
     */
    public function destroy(invoice_parchase_entity $invoice_parchase_entity)
    {
        //
    }
}
