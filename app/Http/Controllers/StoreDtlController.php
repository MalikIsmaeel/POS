<?php

namespace App\Http\Controllers;

use App\Models\store_dtl;
use Illuminate\Http\Request;
use App\Models\store_mstr;
use App\Models\product;
use App\Models\unit;
use App\Models\option;
use App\Models\countery;
use App\Models\catogery;
use App\Models\city;
use App\Models\sub_city;
class StoreDtlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entity=store_dtl::where('active','=','1')->paginate(10);
        $path = storage_public('imgs/' . $entity->photo);

   

    if (!File::exists($path)) {

        abort(404);

    }

  

    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
        return view('POS.additems')->with(['entites'=>$entity]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['counteries']=countery::get()->where('active','=',1);
        $data['stores']=store_mstr::get()->where('active','=',1);
        $data['citys']=city::get()->where('active','=',1);
        $data['catogeries']=catogery::get()->where('active','=',1);
        $data['countery']=countery::get()->where('active','=',1);
        $data['subcites']=sub_city::get()->where('active','=','1');
        $data['products']=product::get()->where('active','=','1');
        $data['types']=option::get()->where('option_name','=','store_type');
        $data['units']=unit::get()->where('active','=','1');
        
        return view('POS.additems',['data'=>$data]);
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

        $products=store_dtl::create( [
            'qty'=>$request->qty,
            'active'=>$request->active,
            'product_id'=>$request->product_id,
            'store_id'=>$request->store_id,
            'unit_id'=>$request->unit_id,
            'cost'=>$request->cost,
            'user_id'=>$request->user_id

            
        ]);

            return redirect()->back()->with('success','Product Added successfully.');
          
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\store_dtl  $store_dtl
     * @return \Illuminate\Http\Response
     */
    public function show(store_dtl $store_dtl)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\store_dtl  $store_dtl
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $entity=store_dtl::findOrfail($id);
        $store=store_mstr::get()->where('active','=','1');
        $product=product::get()->where('active','=','1');
        $unit=unit::get()->where('active','=','1');
        return view('store_dtl.edit')->with(['stores'=>$store,'units'=>$unit,'products'=>$product,'entity'=>$entity]);
   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\store_dtl  $store_dtl
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $entity=store_dtl::findOrfail($id);
        $entity->update( [
            'qty'=>$request->qty,
            'active'=>$request->active,
            'product_id'=>$request->product_id,
            'store_id'=>$request->store_id,
            'unit_id'=>$request->unit_id,
            'cost'=>$request->cost,
            'user_id'=>$request->user_id

            
        ]);

            return redirect()->back()->with('success', 'Product Updated successfully.');
          
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\store_dtl  $store_dtl
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request , $id)
    {
        $entity=store_dtl::findOrfail($id);
        $entity->update( [
            'active'=>$request->input('active','0')
        ]);
        return redirect()->back()->with('success', 'Product Deleted successfully.');
    }
    public function get_by_catogery($id){


        $products['data'] = store_dtl::where("catogery_id",'=',$id)->get() ;
    
        return response()->json(['products'=>$products ]);
    
    
    }
    
}
