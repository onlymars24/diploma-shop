<?php

use App\Models\Brand;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    $brand = Brand::find(1);
    dd($brand->toArray());
    $order_json = '[{"id":5,"quantity":1},{"id":1,"quantity":1}]';
    dd(json_decode($order_json));

    // return '';
});
