<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function reqister(Request $request){
        $validator = Validator::make($request->user, [
            'email' => 'required|unique',
            'name' => 'required',
            'password' => 'required|between:7,30|confirmed'
        ]);

        // $user = User::create([
        //     'email' => $request->email,
        //     'name' => $request->name,
        //     'password' => $request->password,
        //     '' => $request->,
        //     '' => $request->,
        //     '' => $request->,

        // ]);
    }

    public function login(){

    }
}
