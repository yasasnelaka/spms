<?php

namespace App\Http\Controllers;

use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function admin(){
        return view('role_pages.admin');
    }
    public function principle(){
        return view('role_pages.principle');
    }

}
