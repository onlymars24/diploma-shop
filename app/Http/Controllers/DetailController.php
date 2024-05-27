<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Modification;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function all(Request $request){
        $whereParams = [
            ['modification_id', '=', $request->modificationId],
        ];
        if(isset($request->typeId)){
            $whereParams[] = ['type_id', '=', $request->typeId];
        }
        $details = Detail::where($whereParams)->get();
        return response([
            'details' => $details
        ]);
    }
}
