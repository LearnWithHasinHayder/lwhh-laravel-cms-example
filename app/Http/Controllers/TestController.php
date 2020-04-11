<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class TestController extends Controller
{
    function testData(){
        return User::find(2)->friendsStatus()->orderBy('user_id')->get();
    }

}
