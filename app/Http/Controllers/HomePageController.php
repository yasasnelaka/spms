<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

use phpDocumentor\Reflection\File;


class HomePageController extends Controller
{
    public function view(){
        return view('auth.login')->file('uploads','file');
    }
    public function upload(){


    if(Input::hasFile('file')) {

        $file=Input::file('file');
        $file->move('uploads', $file->getClientOriginalName());
        echo '<img src="uploads/'.$file->getClientOriginalName().'"/>';
        }
    }

    public function store(Request $request){
        $notification =new Notification;
        $notification->admition_number = $request->admition_number;
        $notification->message=$request->message;
        $notification->name=$request->name;
        $notification->telephone=$request->telephone;
        $notification->save();

        return redirect()->back();
    }
}
