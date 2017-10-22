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
    return view('welcome');
})->name('home');

Route::get('/table', 'TableController@index')->name('table');
Route::resource('match', 'FinishedMatchesController');
Route::resource('upcoming', 'UpcomingMatchesController');

//update upcoming match - add score
Route::get('upcoming/{id}/score', 'UpcomingMatchesController@showScore')->name('upcoming.add-score');
Route::put('score/{id}', 'UpcomingMatchesController@updateScore')->name('upcoming.update-score');


Route::get('/test', function() {

});


