<?php

namespace App\Http\Controllers;

use App\Models\Modification;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function all(Request $request){
        $modification = Modification::find($request->modificationId);
        return response([
            'details' => $modification->details
        ]);
    }
}
