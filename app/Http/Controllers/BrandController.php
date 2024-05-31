<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Services\ImageService;

class BrandController extends Controller
{
    public function all(){
        $brands = Brand::all();
        return response([
            'brands' => Brand::all()
        ]);
    }

    public function create(Request $request){
        $brand = Brand::create([
            'name' => $request->name,
        ]);
        return response([
            'brand' => $brand
        ]);
    }

    public function edit(Request $request){
        $brand = Brand::create($request->brandId);
        $brand->name = $request->name;
        $brand->save();
        return response([
            'brand' => $brand
        ]);
    }

    public function uploadImage(Request $request){
        if($request->hasFile('file')){
            ImageService::upload('brands', $request->file('file'));
        }
    
    }
}