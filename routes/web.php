<?php

use Illuminate\Support\Facades\Route;

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

// add movies to favorite
Route::get('/add-to-fav/{id}',[App\Http\Controllers\MoviesController::class,'store'])->name('Movies.Add');

Route::get('/', [App\Http\Controllers\MoviesController::class,'index'])->name('movies.index');
Route::get('/movies/{movie}', [App\Http\Controllers\MoviesController::class,'show'])->name('movies.show');

Route::get('/series', [App\Http\Controllers\SeriesController::class,'index'])->name('series.index');
Route::get('/showSeries/{serie}', [App\Http\Controllers\SeriesController::class,'show'])->name('showSeries.show');

Route::get('/actor/{actor}', [App\Http\Controllers\ActorController::class,'show'])->name('actor.show');

