<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontSiteController;
use App\Http\Controllers\dashboard\UserController;
use App\Http\Controllers\dashboard\PostController;
use App\Http\Controllers\dashboard\CategoryController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\AuthController;

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

Route::get('/',[FrontSiteController::class,'showHome'])->name('home');
Route::get('blog', [FrontSiteController::class,'showBlog'])->name('blog');
Route::get('contact', [FrontSiteController::class,'showContact'])->name('contact');
Route::get('single', [FrontSiteController::class,'showSingle'])->name('single');

Route::prefix('admin')->middleware('auth')->group(function (){
    Route::get('/', [DashboardController::class,'index'])->name('admin');
    Route::resource('user',UserController::class);
    Route::resource('post',PostController::class);
    Route::resource('category',CategoryController::class);
});
Route::get('login',[AuthController::class,'logIn'])->name('login');
Route::post('authenticate',[AuthController::class,'authenticate'])->name('authenticate');
Route::get('logout',[AuthController::class,'logOut'])->name('logout');
Route::get('register',[AuthController::class,'register'])->name('register');
Route::post('register',[AuthController::class,'doRegister'])->name('doRegister');









