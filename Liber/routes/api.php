<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DbController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookRatingController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('users', [DbController::class, 'index']);

Route::get('books', [BookController::class, 'index']);
Route::get('averageRating', [BookController::class, 'average']);
Route::post('booksStore', [BookController::class, 'store']);

Route::post('rateBook', [BookRatingController::class, 'store']);