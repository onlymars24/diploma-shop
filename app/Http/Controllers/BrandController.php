<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function all(){
        $brands = Brand::all();
        return response([
            'brands' => Brand::all()
        ]);
    }
}