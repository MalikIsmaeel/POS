<?php

namespace App\Http\Controllers;

use App\Models\option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $option =option::paginate(10);
        return view('option.index')->with(['options'=>$option]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('option.insert');
    }
//     <td>{{$option->option_name }} 
//     </td>
// <td>

// {{$option->option_table}}</td>
// <td>
// {{$option->option_value}}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'option_name'=>'required|unique:options',
            'option_table'=>'required', 
            'option_value'=>'required'
        ]);

        $option=option::create( [
            'option_name'=>$request->option_name,
            'option_table'=>$request->option_table,
            'option_value'=>$request->option_value ,

            
        ]);

            return redirect()->back()->with('success', $request->name.'Product Added successfully.');
     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\option  $option
     * @return \Illuminate\Http\Response
     */
    public function show(option $option)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\option  $option
     * @return \Illuminate\Http\Response
     */
    public function edit(option $option)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\option  $option
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, option $option)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\option  $option
     * @return \Illuminate\Http\Response
     */
    public function destroy(option $option)
    {
        //
    }
}
