<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use Illuminate\Support\Facades\App;
Route::get('/', function () {
    return view('welcome');
});
Route::get('wallet/analyis/{id}','wallet@analyis');
Route::get('/wallet/showmine','wallet@showmine');

Route::resource('wallet','wallet');

Route::auth();

Route::get('/home', 'invite@home');
Route::resource('category','category');
Route::resource('expenses','expenses_c');
Route::post('/user_S','users@search');
Route::resource('invite','invite');
Route::get('/users/{id}','users@show');
Route::delete('/user/delete', [
    'as' => 'delete_user', 'uses' => 'users@delete'
]);

