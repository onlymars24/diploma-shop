<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function order(Request $request){
        Log::info(json_encode($request->cart));
        $cart = $request->cart;
        $list = [];
        $total = 0;
        foreach($cart as $el){
            $detail = Detail::find($el['id']);
            $list[] = ['detail' => $detail->toArray(), 'quantity' => $el['quantity']];
            $total += $detail->price;
        }
        $user = Auth::user();
        Log::info($user);
        $order = Order::create([
            'list' => json_encode($list),
            'total' => $total,
            'user_id' => $user->id
        ]);
        return response([
            'order' => $order
        ]);
        // $cart = json_decode($cart);
    }
}
