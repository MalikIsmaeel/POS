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
        
        $data['numbers']="INV ".(purchase_invoice::get()->last()->id ?? 1);
        $data['products'] =product::get();
        $data['stores']=store_mstr::get();
        $data['units']=unit::where('active','=','1');
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
             'active'=>'required',
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
           'total_vat'=>'required',
          'supplier_id'=>'required',
            'user_id'=>'required'  
     ]);
        
      $purchase=purchase_invoice::create([
        'invoice_number'=>$request->invoice_number,
        'invoice_date'=>$request->invoice_date,
        'date_due'=>$request->date_due,
        'total'=>$request->total,
        'total_vat'=>$request->total_vat,
        'supplier_id'=>$request->supplier_id,
        
        'user_id'=>$request->user_id 
      ]);

        // $purchase->invoice_parchase_entity()::create( [
        //     'qty'=>$request->qty ?? 0,
        //     'active'=>$request->active ?? 1,
        //     'product_id'=>$request->product_id,
        //     'store_id'=>$request->store_id,
        //     'unit_id'=>$request->unit_id,
        //     'cost'=>$request->cost ?? 0,
        //     'user_id'=>$request->user_id,
        //     'store_id'=>$request->store_id,
        //     'tax'=>$request->tax ?? 0.15,
        //     'sub_total'=>$request->sub_total ?? $request->qty * $request->cost
        // ]);
    
    // return redirect()->back()->with('success', $request->invoice_number.'Product Added successfully.');
dd($purchase);        
            // return redirect()->back()->with('success',$request->invoice_number.' Added successfully.');
          
    }

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
