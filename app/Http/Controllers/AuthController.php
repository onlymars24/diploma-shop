<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function reqister(Request $request){
        $validator = Validator::make($request->user, [
            'email' => 'required|size:17',
            'password' => 'required|between:7,30|confirmed',
            'formConditionTop' => 'accepted'
        ]);
    }

    public function login(){

    }
}
