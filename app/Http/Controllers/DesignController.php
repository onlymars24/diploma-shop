<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Detail;
use Illuminate\Http\Request;

class DesignController extends Controller
{
    public function all(Request $request){
        $brand = Brand::find($request->brandId);
        $whereParams = [
            ['brand_id', '=', $request->brandId],
        ];
        if(isset($request->typeId)){
            $whereParams[] = ['type_id', '=', $request->typeId];
        }
        $details = Detail::where($whereParams)->get();
        return response([
            'designs' => $brand->designs,
            'details' => $details
        ]);
    }
}
