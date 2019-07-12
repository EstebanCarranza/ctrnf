<?php

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

Route::get('/', function () {
    return view('index');
});

Route::resource('/challengeDT', 'challengeDT');


Route::get('/Quick','challengeData@getQuick');
Route::get('/Dialy','challengeData@getDialy');
Route::get('/Weekly','challengeData@getWeekly');
Route::get('/Themed','challengeData@getThemed');
Route::get('/Pro','challengeData@getPro');
Route::get('/Tier','challengeData@getTier');
