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
use Illuminate\Support\Facades\Auth;
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
        $data['taxes']=option::get()->where('option_table','=','products');
        $data['units']=unit::get()->where('active','=','1');
    
        
     
        // return view('POS.additems',['data'=>$data]);
        return view('POS.ppp',['data'=>$data]);
       
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        
    
        $product = store_dtl::findOrFail(1);
          
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['qty']++;
        } else {
            $cart[$id] = [
                "product_name" => $product->product_name,
                "qty" => 1,
                "price" => $product->price,
                "image" => $product->qty
            ];
        }
          
        session()->put('cart', $cart);
        return redirect()->back()->with('success','Product Added successfully.');
       
     
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
            // 'product_name'=>'required|unique:store_dtl',
            // 'qty'=>'required',
            // 'product_name'=>'required',
            // 'store_name'=>'required',
            // 'tax_id'=>'requied',
            // 'cost'=>'required',
            'unit_id'=>'required',
            
        ]);
       
        $imageName = $request->product_name.'.'.$request->photo->extension();
        $request->photo->move(public_path('imgs'), $imageName);
        
        $products=store_dtl::create( [
            'qty'=>$request->qty,
            'active'=>$request->active ?? 1,
            'catogery_id'=>$request->catogery_id,
            'product_name'=>$request->product_name,
            'store_name'=>$request->store_name,
            'unit_id'=>$request->unit_id,
            'tax_id'=>$request->tax_id,
            'price'=>$request->price,
            'cost'=>$request->cost,
            'user_id'=>Auth::user()->id

            
        ]);
// return dd($request);
        // $table->string('photo')->nullable();
        // $table->foreignId('catogery_id')->references('id')->on('catogeries')->onDelete('cascade');
        // $table->float('price');
        // $table->float('cost');
        // $table->unsignedInteger('active');
        // $table->foreignId('tax_id')
        // ->references('id')->on('options')
        // ->onDelete('cascade'); // type of tax is it 15% 5% 0% 
        // $table->string('product_name');
        // $table->foreignId('store_name')
        // ->references('id')->on('store_mstrs')
        // ->onDelete('cascade');
        // $table->foreignId('unit_id')
        // ->references('id')->on('units')
        // ->onDelete('cascade');
        // $table->foreignId('user_id')
        // ->references('id')->on('users')
        // ->onDelete('cascade');
      



            return redirect()->back()->with('success','Product Added successfully.');
       
     
 
 
   

    
  

   
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
