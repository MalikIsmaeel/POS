<?php

namespace App\Http\Controllers;

use App\Models\supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { $supplier =supplier::where('active','=','1')->paginate(10);
        
        // ->where('active','=',1);
        // dd($users);
        return view('supplier.index',['suppliers'=>$supplier]);
    
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
        $request->validate([ 
            'company_name'=>'required|unique:suppliers',
            'tax_id'=>'required',
            'reqister_id'=>'required',
            'phone'=>'required',
            'active'=>'requird',
            'type_id'=>in('شركة','فرد'), // is he company of indivdual;
            'sub_city'=>'required',
            'internal'=>['requird',in('محلي','خارجي')],// is he internal or external or hibrid
            'user_id'=>'requird'
          ]);
        suppliers::create([ 
        'company_name'=>$request->company_name,
        'tax_id'=>$request->tax_id,
        'reqister_id'=>$requestreqister_id,
        'phone'=>$request->phone,
        'active'=>$request->acive ?? 0,
        'type_id'=>$request->type_id ?? 'فرد' ,// is he company of indivdual or goverment;
        'sub_city'=>$request->sub_city,
        'internal'=>$request->internal ?? 'داخلي',// is he internal or external or hibrid
        'user_id'=>'requird'
      ]);
      
      return redirect()->back()->with('success', 'Supplier'.$request->company_name .' Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, supplier $supplier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(supplier $supplier)
    {
        //
    }
}
