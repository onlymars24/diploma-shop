<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Generation;
use App\Models\Modification;
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
        $details = Detail::where($whereParams)->with(['type', 'design', 'brand', 'modification', 'generation'])->get();
        return response([
            'modifications' => $generation->modifications,
            'details' => $details
        ]);
    }

    public function create(Request $request){
        $modification = Modification::create([
            'name' => $request->name,
            'generation_id' => $request->generationId
        ]);
        return response([
            'modification' => $modification
        ]);
    }

    public function edit(Request $request){
        $modification = Modification::find($request->modificationId);
        $modification->name = $request->name;
        $modification->save();
        return response([
            'modification' => $modification
        ]);
    }
}
