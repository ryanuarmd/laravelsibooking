<?php

namespace App\Http\Controllers;

use App\User; 
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Booking;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function __construct()
        {
            $this->middleware('auth')->except('create');
        }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      

        $user= auth()->user();  
        $allUser = User::all(); 
        return view('users.index',compact('allUser','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        $user = User::all();
        return view('users.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
          
         return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {   
        $this->authorize('view',$user);
        
        return view('users.edit',compact('user'));
        //users.edit = users/edit, 
        //compact user = membawa value kehamalaman edit dengan nilai user,
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = request()->validate([
            'name'=>'required', 
            'information' => '',
            'image' => 'image',
        ]);   
        
        // dd(request('image')->store('uploads','public')); 
 
        if(request('image')!=null){ 

            //request image and where to store 
            $imagePath = request('image')->store('user','public');  
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
            $image->save();
 
                    
            //set image path from '' to $imagePath
                $imageArray = ['image' => $imagePath];
    
        }  

       

            $lala = array_merge(
                $data,
                    //if imageArray exist or else
                $imageArray ?? []
            );  
 
            $user->update($lala);


            if(request('information')!=null){  
                $us = User::find($user->id); // cari user dengan id = $user->id
                $us->information= $data['information']; //isi bagian information
                $us->save(); //save
            }  

            //berhubung information diatas tidak dapat terupdate secara otomatis, oleh karena itu kita butuh cara manual
            //penyebab : dirahasiakan | unknown

            
 
        return redirect('/users/' . $user->id)->with('message','successfully updated');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect('users'); 
    }

  

}
