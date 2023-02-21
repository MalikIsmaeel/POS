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
use Illuminate\Support\Facades\Storage;
use File;
class POScontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['entity']=store_dtl::get();
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $entity=store_dtl::where('active','=','1')->paginate(10);
        // $path = storage_public('imgs/' . $entity->photo);
        $imageName = $request->product_name.'.'.$request->photo->extension();
        $request->photo->move(public_path('imgs'), $imageName);
        
 
     
 
 
   

    
  

   
     return dd($request);   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
