<?php

use App\Models\Brand;
use App\Models\Design;
use App\Models\Modification;
use Illuminate\Support\Facades\DB;
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
    // $brand->name = 'brand new';
    // $brand->save();
    dd(DB::table('brands')->where('id', 1)->update(['name' => ' very new brand']));
    // return view('welcome');
    $modification = Modification::find(1);
    dd($modification->generation->design->brand);

    // return '';
});
