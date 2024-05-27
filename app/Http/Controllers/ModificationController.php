<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Generation;
use Illuminate\Http\Request;

class ModificationController extends Controller
{
    public function all(Request $request){
        $generation = Generation::find($request->generationId);
        $whereParams = [
            ['generation_id', '=', $request->generationId],
        ];
        if(isset($request->typeId)){
            $whereParams[] = ['type_id', '=', $request->typeId];
        }
        $details = Detail::where($whereParams)->get();
        return response([
            'modifications' => $generation->modifications,
            'details' => $details
        ]);
    }
}
