<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role; 
use Illuminate\Support\Facades\Input;

use function PHPUnit\Framework\returnCallback;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $users =User::paginate(10);
        // ->where('active','=',1);
        // dd($users);
        return view('user.showall',['users'=>$users]);
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
         $request->validate([
            
           'first_name'=>'required',
            'last_name'=>'required',
            'address'=>'required|max:30',
            'user_name'=>'required|unique:users',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8|alpha_dash',
            
                ]);
    
                user::create( [
                
            'email'=>$request->email,
            
           
            'password' =>Hash::make($request->password),
            'phone'=>$request->phone,
           'address'=>$request->address,
            'user_name'=>$request->user_name,
            'first_name' =>$request->first_name,
            'meddile_name'=>$request->imd_name,
            'address'=>$request->address,
            'last_name'=>$request->last_name,
            'active'=>$request->input('active','1'),
    
        ]);
        

   
    return redirect()->back()->with('success', 'User Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users=user::findorfail($id);
        if($users){
            return view('profile',['user'=>$users]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
      
       
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
        $user= user::findorfail($id);
       
      
     
                 $user->update( [
                 
             'email'=>$request->email,         
                         
            'address'=>$request->address,
             'user_name'=>$request->user_name,
             'first_name' =>$request->first_name,
             'meddile_name'=>$request->meddile_name,
             'address'=>$request->address,
             'last_name'=>$request->last_name,
             'active'=>$request->active,
             
         ]);
       
         
        
         return redirect()->back()->with('success', 'User updated successfully.');
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, request $request)
    {
        $user= user::findorfail($id);
        $user->update([
            'active'=>$request->input('active','0')
        ]);

        return redirect()->back()->with('success', 'User deleted successfully.');
    }
}
