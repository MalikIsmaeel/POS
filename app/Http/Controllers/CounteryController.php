<?php

namespace App\Http\Controllers;

use App\Models\countery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Excel;
use App\Imports\countriesImport;


class CounteryController extends Controller
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
        $countery=countery::where('active','=','1')->paginate(10);
        return view('countery.index',['counteries'=>$countery]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        
        return view('countery.insert');
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
            'countery_name'=>'required|unique:counteries|min:5|max:50',
            'description'=>'max:100',
            'user_id'=>'required'
            
            
    
           ]);
           
            $countery=countery::create([
            'countery_name'=>$request->countery_name,
            'description'=>$request->description,
            'active'=>$request->active ?? 0,
            'user_id'=>Auth::user()->id,
      
            ]);
                 
        return redirect()->back()->with('success', $request->countery_name.' Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\countery  $countery
     * @return \Illuminate\Http\Response
     */
    public function show(countery $countery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\countery  $countery
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countery=countery::findOrfail($id);
        return view('countery.edit',['countery'=>$countery]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\countery  $countery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $countery=countery::findOrfail($id);
        $countery->update([
            'countery_name'=>$request->countery_name,
            'description'=>$request->description,
            'active'=>$request->active ?? 0,
            
      
            ]);
                 
        return redirect()->back()->with('success', $request->countery_name.' Eidted successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\countery  $countery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id ,request $request)
    {
        $countery= countery::findorfail($id);
        $countery->update([
            'active'=>$request->input('active','0')
        ]);

        return redirect()->back()->with('success', 'countery deleted successfully.');
    }

    public function fileImportExport()
    {
       return view('file-import')->with('success', 'countery uploaded successfully.');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileImport(Request $request) 
    {
        Excel::import(new countriesImport, $request->file('file')->store('temp'));
        return back()->with('success', 'countery uploaded successfully.');;
    }

}
