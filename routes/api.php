<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/articles/update', 'App\Http\Controllers\ArticlesController@store')->name('articles.update');
Route::get('/articles','App\Http\Controllers\ArticlesController@index')->name('articles.index');
Route::get('/articles/{id}','App\Http\Controllers\ArticlesController@show')->name('articles.show');
Route::delete('/articles/{id}', 'App\Http\Controllers\ArticlesController@delete')->name('articles.delete');
Route::post('/articles','App\Http\Controllers\ArticlesController@create')->name('articles.create');