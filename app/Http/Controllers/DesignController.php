<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class DesignController extends Controller
{
    public function all(Request $request){
        $brand = Brand::find($request->brandId);
        return response([
            'designs' => $brand->designs
        ]);
    }
}
