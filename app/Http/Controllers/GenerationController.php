<?php

namespace App\Http\Controllers;

use App\Models\Design;
use Illuminate\Http\Request;

class GenerationController extends Controller
{
    public function all(Request $request){
        $design = Design::find($request->designId);
        return response([
            'generations' => $design->generations
        ]);
    }
}
