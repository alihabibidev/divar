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

Route::get('/', function () {
    return view('layouts.app');
})->name('home.index');

Route::get('/add-poster-page', function () {
    return view('add-poster');
});
Route::post('/add-poster-action ', [\App\Http\Controllers\PosterController::class, 'addPoster']);

Route::get('/show-posters', [\App\Http\Controllers\PosterController::class, 'getPosters']);

//Auth::routes();
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::namespace('Auth')->get('Register','RegisterController@showregister')->name('register.form.show');




Route::namespace('Auth')->group(function() {
    Route::get('register', 'RegisterController@showregister')->name('register.form.show');
    Route::post('register', 'RegisterController@register')->name('register.index');
    Route::get('login', 'LoginController@showlogin')->name('login.show');
    Route::post('login', 'LoginController@login')->name('login.index');
    Route::get('show/verify', 'VerificationController@showverify')->name('show.verify.index');


    Route::post('verify', 'VerificationController@verify')->name('verify.index');

});



