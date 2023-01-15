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
    public function index($id)
    {
       $pur_entity=invoice_parchase_entity::where('invoice_id','=',$id);
       
        $entity=$pur_entity->paginate(10);

      return  view('purchase.index',['entities'=>$entity]);
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
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
