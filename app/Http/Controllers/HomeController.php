<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
      if (Auth::user()->role_id == 1){
           return redirect('/admin');
        }else if (Auth::user()->role_id == 2){
           return redirect('/principle_home');

        }else if (Auth::user()->role_id == 3) {
          return redirect('/students');
        }else if (Auth::user()->role_id==4) {
          return redirect('/teacher');
        }else if (Auth::user()->role_id==5){
            return redirect('/class_teacher');
        }else{
            return view('auth.login');
        }

    }



}
