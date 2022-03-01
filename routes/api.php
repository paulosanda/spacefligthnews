<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/articles/update', 'App\Http\Controllers\GetArticlesController@store')->name('articles.update');
Route::get('/articles','App\Http\Controllers\GetArticlesController@index')->name('articles.index');
Route::get('/articles/{id}','App\Http\Controllers\GetArticlesController@show')->name('articles.show');