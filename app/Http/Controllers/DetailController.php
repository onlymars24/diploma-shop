<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Modification;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function one(Request $request){
        return response([
            'detail' => Detail::find($request->detailId)
        ]);
    }
    public function all(Request $request){
        $whereParams = [
            ['modification_id', '=', $request->modificationId],
        ];
        if(isset($request->typeId)){
            $whereParams[] = ['type_id', '=', $request->typeId];
        }
        $details = Detail::where($whereParams)->with(['type', 'design', 'brand', 'modification', 'generation'])->get();
        return response([
            'details' => $details
        ]);
    }
}
