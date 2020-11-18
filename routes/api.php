<?php

use App\Http\Controllers\AdsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\brandsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\Notification;
use App\Http\Controllers\Statistic;
use App\Http\Controllers\Subscription;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('/login', [AuthController::class,'login'])->name('login');
Route::post('/signup', [AuthController::class,'signup'])->name('signup');
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class,'logout'])->name('logout');

Route::middleware('auth:sanctum')->get('/profile', [UsersController::class,'get_current'])->name('get_current_user');
Route::middleware('auth:sanctum')->put('/profile/edit', [UsersController::class,'edit_profile'])->name('edit_profile');
Route::middleware('auth:sanctum')->post('/profile/editPDP', [UsersController::class,'edit_pdp'])->name('edit_pdp');


Route::middleware('auth:sanctum')->get('/category/ads/{id_ads}', [AdsController::class,'get_one'])->name('get_one_ads');
Route::middleware('auth:sanctum')->post('/category/ads/add', [AdsController::class,'add_ads'])->name('add_ads');
Route::middleware('auth:sanctum')->put('/category/ads/edit/{id_ads}', [AdsController::class,'edit_ads'])->name('edit_ads');
Route::middleware('auth:sanctum')->delete('/category/ads/delete/{id_ads}', [AdsController::class,'delete_ads'])->name('delete_ads');
Route::middleware('auth:sanctum')->get('/category/{id_category}/ads', [AdsController::class,'get_ads_by_category'])->name('get_ads_by_category');
Route::middleware('auth:sanctum')->put('/ads/{id_ads}/view/add', [AdsController::class,'view_ads'])->name('view_ads');
Route::middleware('auth:sanctum')->get('/ads/{id_ads}/view', [AdsController::class,'ads_view'])->name('ads_view');
Route::middleware('auth:sanctum')->get('/ads', [AdsController::class,'get_all_ads'])->name('get_all_ads');


Route::middleware('auth:sanctum')->get('/brands', [brandsController::class,'get_all_brands'])->name('get_all_brands');
Route::middleware('auth:sanctum')->get('/brands/{id}', [brandsController::class,'get_one'])->name('get_one_brand');
Route::middleware('auth:sanctum')->post('/brands/add', [brandsController::class,'add_brand'])->name('add_brand');
Route::middleware('auth:sanctum')->put('/brands/edit/{id}', [brandsController::class,'edit_brand'])->name('edit_brand');

Route::middleware('auth:sanctum')->get('/categories', [CategoriesController::class,'get_all_categories'])->name('get_all_categories');
Route::middleware('auth:sanctum')->get('/categories/{id}', [CategoriesController::class,'get_one'])->name('get_one_category');


Route::middleware('auth:sanctum')->get('/notifications', [Notification::class,'notifications'])->name('notification');
Route::middleware('auth:sanctum')->post('/subscribe', [Subscription::class,'subscribe'])->name('subscribtion');



Route::middleware('auth:sanctum')->get('/messageCategories', [MessageController::class,'message_categories'])->name('message_categories');
Route::middleware('auth:sanctum')->post('/contact', [MessageController::class,'contact'])->name('contact');


Route::get('/statistics/{feature}/{ads_id}', [Statistic::class,'statistic'])->name('statistic');
Route::middleware('auth:sanctum')->get('/dashboard', [Statistic::class,'dashboard'])->name('statistic');
Route::post('/test', function (Request $request)
{
    $files = $request->file;
    $arr = array();
    foreach ($request->file as $file) {
        
        $arr[$file->getClientOriginalName()] = $file->getClientOriginalName();
        $file->move(public_path().'/files/', $file->getClientOriginalName());
        $url = url('/files/'.$file->getClientOriginalName());
        return redirect($url);
    }

    return $arr;
})->name('test');

/* 
Route::middleware('auth:sanctum')->post('/logout', ["JwtAuthController","logout"]);
Route::middleware('auth:sanctum')->post('/getuser', ["JwtAuthController","getuser"]); */
