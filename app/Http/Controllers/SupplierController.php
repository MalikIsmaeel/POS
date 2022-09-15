<?php

namespace App\Http\Controllers;

use App\Models\supplier;
use Illuminate\Http\Request;
use App\Models\sub_city;

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
        $sub_city=sub_city::get()->where('active','=','1');
        
        return view('supplier.insert')->with('sub_cities',$sub_city); 
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
            'active'=>'required',
            'type_id'=>'required', // is he company of indivdual or govermnet;
            'sub_city'=>'required',
            'internal'=>'required',// is he internal or external or hibrid
            'user_id'=>'required'
          ]);
        supplier::create([ 
        'company_name'=>$request->company_name,
        'tax_id'=>$request->tax_id,
        'reqister_id'=>$request->reqister_id,
        'phone'=>$request->phone,
        'active'=>$request->active ?? 0,
        'type_id'=>$request->type_id ?? 'فرد' ,// is he company of indivdual or goverment;
        'sub_city'=>$request->sub_city,
        'internal'=>$request->internal ?? 'داخلي',// is he internal or external or hibrid
        'user_id'=>$request->user_id
      ]);
      
      return redirect()->back()->with('success',$request->company_name .' Added successfully.');
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
    public function edit($id)
    {
        $sub_city=sub_city::get()->where('active','=','1');
        $supplier=supplier::findOrfail($id);
        return view('supplier.edit')->with(['sub_cities'=>$sub_city,'supplier'=>$supplier]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
      $supplier=supplier::findOrfail($id);
        $supplier->update([ 
            'company_name'=>$request->company_name,
            'tax_id'=>$request->tax_id,
            'reqister_id'=>$request->reqister_id,
            'phone'=>$request->phone,
            'active'=>$request->active ?? 0,
            'type_id'=>$request->type_id ?? 'فرد' ,// is he company of indivdual or goverment;
            'sub_city'=>$request->sub_city,
            'internal'=>$request->internal ?? 'داخلي',// is he internal or external or hibrid
            'user_id'=>$request->user_id
          ]);
          
          return redirect()->back()->with('success',$request->company_name .' Updated successfully.');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id , request $request)
    {
        $supplier= supplier::findorfail($id);
        $supplier->update([
            'active'=>$request->input('active','0')
        ]);

        return redirect()->back()->with('success', 'Unit deleted successfully.');
    }
}
