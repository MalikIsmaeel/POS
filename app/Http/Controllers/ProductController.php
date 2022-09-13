<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use App\Models\catogery;
use Illuminate\Support\Facades\DB;
use App\Models\user;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product =product::where('active','=','1')->paginate(10);
        // ->where('active','=',1);
        // dd($users);
        return view('product.index',['products'=>$product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catogeries= catogery::get();
       return   view('product.insert')->with('catogeries',$catogeries);
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
            'name'=>'required|unique:products',
            'active'=>'required', 
        ]);

        $products=product::create( [
            'name'=>$request->name,
            'active'=>$request->active ?? 0,
            'photo'=>$request->photo ,
            'catogery_id'=>$request->catogery_id,
            'user_id'=>Auth()->user()->id,

            
        ]);

            return redirect()->back()->with('success', $request->name.'Product Added successfully.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $product=product::findorfail($id);
        
            // return view('profile',['product'=>$product]);
    
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=user::get();
        $product=product::findorfail($id);
       $catogeries=catogery::get();
      return view('product.edit',['product'=>$product,'catogeries'=>$catogeries, 'users'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product=product::findorfail($id);
        $product->update([
            'name'=>$request->name,
            'active'=>$request->active ?? 0,
            'photo'=>$request->photo ,
            'catogery_id'=>$request->catogery_id,
            
            ]);
            
            return redirect()->back()->with('success', 'Catogery edited successfully.');   
    } 

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, request $request)
    {
        $product=product::findorfail($id);
        if($product){
        $product->update( [

            'active'=>$request->input('0'),
       
        ]);
        }

            return redirect()->back()->with('success', 'Product Deleted successfully.');
    }
}
