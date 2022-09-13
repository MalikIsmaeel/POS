<?php

namespace App\Http\Controllers;

use App\Models\unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\user;
class UnitController extends Controller
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
        $unit=  DB::table('units as main_unit')
       ->select('sub_unit.unit_name as unit_name', 'sub_unit.no_of_units as no_of_unit','main_unit.unit_name as main_unit','main_unit.id as parent_id')
       ->LeftJoin('units as sub_unit', 'main_unit.parent_id','=','sub_unit.id')::where('active','=','1')->paginate(10);
      return   view('unit.index')->with('units',$unit);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unit=unit::get()->where('active','=','1');
        
        return view('unit.insert')->with('units',$unit);
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
            'unit_name'=>'required|unique:units|min:5|max:50',
            'no_of_units'=>'max:100',
            'user_id'=>'required'
            
            
    
           ]);
           
            $unit=unit::create([
                'unit_name'=>$request->unit_name,
                'no_of_units'=>$request->no_of_units,
            'active'=>$request->active ?? 0,
            'user_id'=>Auth::user()->id,
            'parent_id'=>$request->parent_id
            ]);
            
            return redirect()->back()->with('success', 'Unit Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=user::get();
        $unit=unit::findorfail($id);
       $units=unit::get();
      return view('unit.edit',['sub_unit'=>$unit,'main_unit'=>$units, 'users'=>$user]);
 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $unit=unit::findorfail($id);
        $unit->update([
            'unit_name'=>$request->unit_name,
            'no_of_units'=>$request->no_of_units,
            'active'=>$request->active,
            'user_id'=>$request->user_id,
            'parent_id'=>$request->parent_id
            ]);
            
            return redirect()->back()->with('success', 'Unit edited successfully.'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id , request $request)
    {
        $unit= unit::findorfail($id);
        $unit->update([
            'active'=>$request->input('active','0')
        ]);

        return redirect()->back()->with('success', 'Unit deleted successfully.');
    }
}
