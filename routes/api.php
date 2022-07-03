<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\PostController;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\CategoryController;
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

Route::middleware(['jwt.verify'])->group(function(){
    Route::get("/posts",[PostController::class,"index"]);
    Route::get("/post/{id}",[PostController::class,"show"]);
    Route::post("/posts",[PostController::class,"store"]);
    Route::put("/post/{id}",[PostController::class,"update"]);
    Route::delete("/post/{id}",[PostController::class,"destroy"]);
    Route::get("/categories",[CategoryController::class,"index"]);
    Route::post("/category",[CategoryController::class,"store"]);
    Route::get("/category/{id}",[CategoryController::class,"show"]);
    Route::put("/category/{id}",[CategoryController::class,"update"]);
    Route::delete("/category/{id}",[CategoryController::class,"destroy"]);





});



Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
