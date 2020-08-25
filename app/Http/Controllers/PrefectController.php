<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrefectController extends Controller
{
    public function view(){
        return view('prefect_selection.prefect');
    }
}
