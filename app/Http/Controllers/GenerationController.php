<?php

namespace App\Http\Controllers;

use App\Models\Design;
use App\Models\Detail;
use App\Models\Generation;
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

    public function create(Request $request){
        $generation = Generation::create([
            'name' => $request->name,
            'design_id' => $request->designId
        ]);
        return response([
            'generation' => $generation
        ]);
    }

    public function edit(Request $request){
        $generation = Generation::find($request->generationId);
        $generation->name = $request->name;
        $generation->save();
        return response([
            'generation' => $generation
        ]);
    }
}