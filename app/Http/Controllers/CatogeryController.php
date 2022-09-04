<?php

namespace App\Http\Controllers;

use App\Models\catogery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\user;
class CatogeryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $catogery=  DB::table('catogeries as main_catogery')
       ->select('sub_catogery.catogery_name as catogery_name', 'sub_catogery.description as description','main_catogery.catogery_name as main_catogery','sub_catogery.id as child_id')
       ->rightJoin('catogeries as sub_catogery', 'sub_catogery.id', '=', 'main_catogery.parent_id')
       ->get();
      return   view('catogery.index')->with('catogeries',$catogery);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catogery=catogery::get()->where('active','=','1');
        
        return view('catogery.insert')->with('catogeries',$catogery);
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
        'catogery_name'=>'required|unique:catogeries|min:5|max:50',
        'description'=>'max:100',
        'user_id'=>'required'
        
        

       ]);
       
        $catogery=catogery::create([
        'catogery_name'=>$request->catogery_name,
        'description'=>$request->description,
        'active'=>$request->active ?? 0,
        'user_id'=>$request->user_id,
        'parent_id'=>$request->parent_id
        ]);
        
        return redirect()->back()->with('success', 'Catogery Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\catogery  $catogery
     * @return \Illuminate\Http\Response
     */
    public function show(catogery $catogery)
    {
    
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\catogery  $catogery
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {     $user=user::get();
         $catogery=catogery::findorfail($id);
        $catogeries=catogery::get();
       return view('catogery.edit',['sub_catogery'=>$catogery,'main_catogery'=>$catogeries, 'users'=>$user]);
    dd($catogeries);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\catogery  $catogery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $catogery=catogery::findorfail($id);
        $catogery->update([
            'catogery_name'=>$request->catogery_name,
            'description'=>$request->description,
            'active'=>$request->active,
            'user_id'=>$request->user_id,
            'parent_id'=>$request->parent_id
            ]);
            
            return redirect()->back()->with('success', 'User Added successfully.'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\catogery  $catogery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, request $request )
    {
        $catogery= catogery::findorfail($id);
        $catogery->update([
            'active'=>$request->input('active','0')
        ]);

        return redirect()->back()->with('success', 'Catogery deleted successfully.');
    }
}
