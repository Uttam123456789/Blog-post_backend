<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\Categorycontroller;
use App\Http\Controllers\Postcontroller;
use App\Http\Controllers\Commentcontroller;


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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// user
Route::post("userStore",[Usercontroller::class,'store']);
Route::post("login",[Usercontroller::class,'loginUser']);
// Route::get("login",[Usercontroller::class,'loginUser']);
Route::middleware('auth:api')->get("home",[Usercontroller::class,'home']);
Route::middleware('auth:api')->post('logoutUser',[Usercontroller::class,'logoutUser']);
// Route::post('/logoutUser',[Usercontroller::class,'logoutUser'])->middleware('auth:api');
Route::post("update/{id}",[Usercontroller::class,'update']);
Route::get("userView/{id}",[Usercontroller::class,'list']);
Route::get("detail",[Usercontroller::class,'detail']);


//category
Route::post("categoryStore",[Categorycontroller::class,'store']);
Route::delete("categoryDelete/{id}",[Categorycontroller::class,'destroy']);
Route::post("categoryUpdate/{id}",[Categorycontroller::class,'update']);
Route::get("categoryView",[Categorycontroller::class,'view']);


//Posts
Route::post("postStore",[Postcontroller::class,'store']);
Route::delete("postDelete/{id}",[Postcontroller::class,'destroy']);
Route::post("postUpdate/{id}",[Postcontroller::class,'update']);
Route::get("postView",[Postcontroller::class,'view']);


// comments
Route::post("commentStore",[Commentcontroller::class,'store']);
Route::delete("commentDelete/{id}",[Commentcontroller::class,'destroy']);
Route::post("commentUpdate/{id}",[Commentcontroller::class,'update']);

