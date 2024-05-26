<?php

namespace App\Http\Controllers;

use App\Models\Generation;
use Illuminate\Http\Request;

class ModificationController extends Controller
{
    public function all(Request $request){
        $generation = Generation::find($request->generationId);
        return response([
            'modifications' => $generation->modifications
        ]);
    }
}
