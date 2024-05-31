<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;



class ImageService
{
    public static function upload($table, $file){
            // $file = $request->file('file');
            $path = $file->store('image');
            $row = DB::table($table)->find(1);
            $filePath = public_path($row->image);
            if(File::exists($filePath)) {
                File::delete($filePath);
            }
            DB::table($table)->where('id', 1)->update(['image' => $path]);
    }
}