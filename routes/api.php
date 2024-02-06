<?php

use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//list post route
Route::get('/posts',([PostController::class,'index']));

//list post single route
Route::get('/posts/{id}/show',([PostController::class,'show']));

//create new post route
Route::post('/posts',([PostController::class,'store']));

//update post route
Route::put('/posts',([PostController::class,'store']));

//delete post route
Route::delete('/posts/{id}/delete',([PostController::class,'destroy']));
