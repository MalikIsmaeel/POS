<?php

namespace App\Http\Controllers;

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
      $number =purchase_invoice::max('id')??1;
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
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(purchase_invoice $purchase_invoice)
    {
        //
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
