<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Design;
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
        $details = Detail::where($whereParams)->with(['type', 'design', 'brand', 'modification', 'generation'])->get();
        return response([
            'designs' => $brand->designs,
            'details' => $details
        ]);
    }

    public function create(Request $request){
        $design = Design::create([
            'name' => $request->name,
            'brand_id' => $request->brandId
        ]);
        return response([
            'design' => $design
        ]);
    }

    public function edit(Request $request){
        $design = Design::create($request->designId);
        $design->name = $request->name;
        $design->save();
        return response([
            'design' => $design
        ]);
    }
}
