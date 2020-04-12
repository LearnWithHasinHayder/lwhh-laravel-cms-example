<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        $status = \App\Status::orderBy('id','desc')->get();
        return view( "public", array( 'status' => $status) );
    }
}
