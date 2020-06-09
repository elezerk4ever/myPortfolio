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
    return view('welcome');
});

Auth::routes(['register'=>false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::put('/about','AboutController@update')->name('about.update');
Route::put('/home','UserController@update')->name('user.update');

//social link
Route::post('/socials','SocialsController@store')->name('socials.store');
Route::delete('/socials/{social}','SocialsController@destroy')->name('socials.destroy');

//works 
Route::get('/works','WorksController@index')->name('works.index');
Route::post('/works','WorksController@store')->name('works.store');
Route::delete('/works/{work}','WorksController@destroy')->name('works.destroy');
Route::put('/works/{work}','WorksController@update')->name('works.update');

//skils 
Route::post('/skills','SkillsController@store')->name('skills.store');
Route::delete('/skills/{skill}','SkillsController@destroy')->name('skills.destroy');
