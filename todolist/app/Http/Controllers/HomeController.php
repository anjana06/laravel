<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\task;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $uid=Auth::id();
        $user = Auth::user();
        $uname= $user['email'];
        session(['name'=>$uname]);
        // use where clause to fetch a particular record
       // $data=task::where('uid','=',$uid)->get();
        //$data=task::where('uid','=',$uid)->where('title','anjana')->get();
        //order by
        //variable=modelname::orderby('column_name','asc|dec')->get();
        // $data=task::orderby('date')->where('uid','=',$uid)->get();
        $data=task::orderby('date','desc')->where('uid','=',$uid)->get();
        //$data=task::orderby('detail','desc')->get();
        return view('home',compact('data'));  
    }
    
   
}
