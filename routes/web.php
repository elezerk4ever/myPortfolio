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

//Interests
Route::post('/interests','InterestsController@store')->name('interests.store');
Route::delete('/interests/{interest}','InterestsController@destroy')->name('interests.destroy');

//professions 
Route::put('/professions','ProfessionsController@update')->name('professions.update');

//resume
Route::get('/resume','ResumeController@index')->name('resume.index');

//educations 
Route::post('/educations','EducationsController@store')->name('educations.store');
Route::delete('/educations/{education}','EducationsController@destroy')->name('educations.destroy');

//experiences
Route::post('/experiences','ExperiencesController@store')->name('exp.store');
Route::delete('/experiences/{experience}','ExperiencesController@destroy')->name('exp.destroy');

//Task of experiences
Route::post('/tasks','TasksController@store')->name('tasks.store');
Route::delete('/tasks/{task}','TasksController@destroy')->name('tasks.destroy');

//credentials
Route::post('/credentials','CredentialsController@store')->name('credentials.store');
Route::delete('/credentials/{credential}','CredentialsController@destroy')->name('credentials.destroy');

//testemonies
Route::get('/testimonies','TestimoniesController@index')->name('testimony.index');
Route::post('/testimonies','TestimoniesController@store')->name('testimony.store');
Route::delete('/testimonies/testimony','TestimoniesController@destroy')->name('testimony.destroy');