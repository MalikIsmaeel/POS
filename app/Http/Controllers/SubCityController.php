<?php

namespace App\Http\Controllers;

use App\Models\city;
use App\Models\sub_city;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SubCityController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub_city= sub_city::paginate(10);
        return   view('sub_city.index')->with('sub_cities',$sub_city);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $city=city::get()->where('active','=','1');
        return view('sub_city.insert',['cities'=>$city]);
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
            'sub_cities_name'=>'required|unique:sub_cities|min:5',
            'description'=>'max:200',
            
            'active'=>'required',
            'city_id'=>'required'
        ]);
        $sub_city=sub_city::create([
            'sub_cities_name'=>$request->sub_cities_name,
            'description'=>$request->description,
            'active'=>$request->active ?? 0,
            'user_id'=>Auth::user()->id,
            'city_id'=>$request->city_id
        ]);
        return redirect()->back()->with('success', $request->sub_cities_name.' Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sub_city  $sub_city
     * @return \Illuminate\Http\Response
     */
    public function show(sub_city $sub_city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sub_city  $sub_city
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city=city::get()->where('active','=','1');
        $sub_city=sub_city::findOrfail($id);
        return view('sub_city.edit',['sub_city'=>$sub_city],['cities'=>$city]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sub_city  $sub_city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $city=sub_city::findOrfail($id);
        $city->update([
            'sub_city_name'=>$request->sub_cities_name,
            'description'=>$request->description,
            'active'=>$request->active ?? 0,
            'city'=>$request->city_id
            
      
            ]);
                 
        return redirect()->back()->with('success', $request->sub_cities_name.' Eidted successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sub_city  $sub_city
     * @return \Illuminate\Http\Response
     */
    public function destroy($id , request $request)
    {
        $sub_city= sub_city::findorfail($id);
        $sub_city->update([
            'active'=>$request->input('active','0')
        ]);

        return redirect()->back()->with('success', 'countery deleted successfully.');
    }
}
