<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //member sign up
    public function signup(Request $request)
    {
        $from=$request->all();
    }
}
