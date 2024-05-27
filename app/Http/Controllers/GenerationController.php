<?php

namespace App\Http\Controllers;

use App\Models\Design;
use App\Models\Detail;
use Illuminate\Http\Request;

class GenerationController extends Controller
{
    public function all(Request $request){
        $design = Design::find($request->designId);
        $whereParams = [
            ['design_id', '=', $request->designId],
        ];
        if(isset($request->typeId)){
            $whereParams[] = ['type_id', '=', $request->typeId];
        }
        $details = Detail::where($whereParams)->with(['type', 'design', 'brand', 'modification', 'generation'])->get();
        return response([
            'generations' => $design->generations,
            'details' => $details
        ]);
    }
}