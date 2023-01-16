<?php

namespace App\Http\Controllers;
use App\Models\unit;
use App\Models\catogery;
use App\Models\invoice_parchase_entity;

use App\Models\supplier;
use App\Models\product;
use App\Models\store_mstr;

use App\Models\purchase_invoice;
use Illuminate\Http\Request;

class PurchaseInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */   public function __construct()
    {
        $this->middleware('auth');
        
    }

    public function index()
    {
     $purchase=purchase_invoice::paginate(10);
      $number =purchase_invoice::get()->max('id') ?? 1;
      return  view('purchase_invoice.index',['purchases'=>$purchase],['max_number'=>$number]);
//    dd($number);
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
        $data['purchases'] =purchase_invoice::findorfail($id);
        $data['numbers']="INV ".($id);
        $data['products'] =product::get();
        $data['stores']=store_mstr::get();
        $data['units']=unit::get()->where('active','=','1');
        $data['suppliers']=supplier::get();
        $data['catogeriess']= catogery::where('active','=',1);
        return view('purchase.insert')->with(['data'=>$data]);    //    with('catogeries','suppliers','units','units','stores','numbers','products')->with($catogeries,$supplier,$unit,$store,$number,$product);
    
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\purchase_invoice  $purchase_invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(purchase_invoice $purchase_invoice)
    {
        //
    }
}
