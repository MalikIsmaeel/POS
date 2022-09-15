<?php

namespace App\Http\Controllers;

use App\Models\invoice_parchase_entity;
use Illuminate\Http\Request;

class InvoiceParchaseEntityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $catogery=catogery::
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unit=unit::where('active','=','1');
        $catogeries= catogery::where('active','=','1');
        return   view('purchase.insert')->with('catogeries',$catogeries);
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
            'qty'=>'required',
            'active'=>'required',
            'product_id'=>'required',
            'store_id'=>'required',
            'cost'=>'required',
            'unit_id'=>'required',
            'user_id'=>'required'  
        ]);

        $purchase=invoice_parchase_entity::create( [
            'qty'=>$request->qty ?? 0,
            'active'=>$request->active ?? 1,
            'product_id'=>$request->product_id,
            'store_id'=>$request->store_id,
            'unit_id'=>$request->unit_id,
            'cost'=>$request->cost ?? 0,
            'user_id'=>$request->user_id,
            'store_id'=>$request->store_id,
            'tax'=>$request->tax ?? 0.15
        ]);

            return redirect()->back()->with('success','Product Added successfully.');
          
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
