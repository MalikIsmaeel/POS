<?php

namespace App\Http\Controllers;

use App\Models\city;
use App\Models\countery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\callback;

class CityController extends Controller
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
        $city= city::paginate(10);
        return   view('city.index')->with('cities',$city);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countery=countery::get()->where('active','=','1');
        return view('city.insert',['counteries'=>$countery]);
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
            'city_name'=>'required|unique:cities|min:5',
            'description'=>'max:200',
            
            'active'=>'required',
            'countery_id'=>'required'
        ]);
        $city=city::create([
            'city_name'=>$request->city_name,
            'description'=>$request->description,
            'active'=>$request->active ?? 0,
            'user_id'=>Auth::user()->id,
            'countery_id'=>$request->countery_id
        ]);
        return redirect()->back()->with('seccuess','The '. $request->city_name . ' been Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\city  $city
     * @return \Illuminate\Http\Response
     */
    public function show(city $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\city  $city
     * @return \Illuminate\Http\Response
     */
    
        public function edit($id)
    {
        $countery=countery::get()->where('active','=','1');
        $city=city::findOrfail($id);
        return view('city.edit',['city'=>$city],['counteries'=>$countery]);
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\city  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $city=countery::findOrfail($id);
        $city->update([
            'city_name'=>$request->city_name,
            'description'=>$request->description,
            'active'=>$request->active ?? 0,
            'countery_id'=>$request->countery_id
            
      
            ]);
                 
        return redirect()->back()->with('success', $request->city_name.' Eidted successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\city  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(city $city)
    {
        //
    }
}
