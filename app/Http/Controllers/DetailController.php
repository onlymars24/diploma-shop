<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Modification;
use Illuminate\Http\Request;
use App\Http\Services\ImageService;
use Illuminate\Database\Eloquent\Builder;

class DetailController extends Controller
{
    public function one(Request $request){
        return response([
            'detail' => Detail::with(['type', 'design', 'brand', 'modification', 'generation'])->find($request->detailId)
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

    public function filter(Request $request){
        $filter = $request->filter;
        $details = Detail::where('detail_brand', 'like', '%'.$filter.'%')
        ->orwhereHas('design', function (Builder $query) use($filter) {
            $query->where('name', 'like', '%'.$filter.'%');
        })
        ->orWhereHas('brand', function (Builder $query) use($filter)  {
            $query->where('name', 'like', '%'.$filter.'%');
        })
        ->orWhereHas('generation', function (Builder $query) use($filter)  {
            $query->where('name', 'like', '%'.$filter.'%');
        })
        ->orWhereHas('modification', function (Builder $query) use($filter)  {
            $query->where('name', 'like', '%'.$filter.'%');
        })
        ->with(['design', 'brand', 'generation', 'modification', 'type'])
        ->get();
        return response([
            'details' => $details
        ]);
    }

    public function create(Request $request){
        $modification = Modification::find($request->modificationId);
        $generation = $modification->generation;
        $design = $generation->design;
        $brand = $design->brand;
        $detail = Detail::create([
            'detail_brand' => $request->detail_brand,
            'number' => $request->number,
            'descr' => $request->descr,
            'price' => $request->price,
            'count' => $request->count,
            'brand_id' => $brand->id,
            'design_id' => $design->id,
            'generation_id' => $generation->id,
            'modification_id' => $modification->id,
            'type_id' => $request->typeId,
        ]);
        return response([
            'detail' => $detail
        ]);
    }

    public function edit(Request $request){
        $detail = Detail::find($request->detailId);
        $detail->update([
            'detail_brand' => $request->detail_brand,
            'number' => $request->number,
            'descr' => $request->descr,
            'price' => $request->price,
            'count' => $request->count
        ]);
        return response([
            'detail' => $detail
        ]);
    }

    public function uploadImage(Request $request){
        if($request->hasFile('file')){
            ImageService::upload('details', $request->file('file'), $request->detailId);
        }
    }
}
