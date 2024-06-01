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
Route::post('/brands/create', [BrandController::class, 'create']);
Route::post('/brands/edit', [BrandController::class, 'edit']);
Route::post('/brands/image/upload', [BrandController::class, 'uploadImage']);


Route::get('/designs', [DesignController::class, 'all']);
Route::post('/designs/create', [DesignController::class, 'create']);
Route::post('/designs/edit', [DesignController::class, 'edit']);

Route::get('/generations', [GenerationController::class, 'all']);
Route::post('/generations/create', [GenerationController::class, 'create']);
Route::post('/generations/edit', [GenerationController::class, 'edit']);
Route::post('/generations/image/upload', [GenerationController::class, 'uploadImage']);

Route::get('/modifications', [ModificationController::class, 'all']);
Route::post('/modifications/create', [ModificationController::class, 'create']);
Route::post('/modifications/edit', [ModificationController::class, 'edit']);

Route::get('/detail', [DetailController::class, 'one']);
Route::get('/details', [DetailController::class, 'all']);
Route::get('/details/create', [DetailController::class, 'create']);
Route::post('/details/image/upload', [DetailController::class, 'uploadImage']);

Route::get('/types', [TypeController::class, 'all']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
