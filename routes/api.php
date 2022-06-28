<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('books',\App\Http\Controllers\BookController::class);
Route::resource('authors',\App\Http\Controllers\AuthorController::class);
Route::resource('categories',\App\Http\Controllers\CategoryController::class);
Route::resource('prizes',\App\Http\Controllers\PrizeController::class);
