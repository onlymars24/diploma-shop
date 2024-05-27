<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\DesignController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\GenerationController;
use App\Http\Controllers\ModificationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/brands', [BrandController::class, 'all']);

Route::get('/designs', [DesignController::class, 'all']);

Route::get('/generations', [GenerationController::class, 'all']);

Route::get('/modifications', [ModificationController::class, 'all']);

Route::get('/detail', [DetailController::class, 'one']);
Route::get('/details', [DetailController::class, 'all']);

Route::get('/types', [TypeController::class, 'all']);