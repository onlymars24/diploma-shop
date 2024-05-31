<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\OrderController;
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

Route::middleware('auth:api')->group(function(){ 
    Route::post('/order', [OrderController::class, 'order']);
    Route::get('/user', [AuthController::class, 'user']);
});


Route::post('/order/status', [OrderController::class, 'status']);




Route::get('/brands', [BrandController::class, 'all']);

Route::get('/designs', [DesignController::class, 'all']);

Route::get('/generations', [GenerationController::class, 'all']);

Route::get('/modifications', [ModificationController::class, 'all']);

Route::get('/detail', [DetailController::class, 'one']);
Route::get('/details', [DetailController::class, 'all']);

Route::get('/types', [TypeController::class, 'all']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
