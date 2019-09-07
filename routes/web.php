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

Route::get('/', 'FrontController@index');

Route::resource('userAnswer', 'UserAnswerController');

Route::get('/{id}', 'UserAnswerController@show')->where('id', '[0-9a-fA-F]{8}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{12}');

Auth::routes(['register' => false, 'reset'=> false]);

// Admin routes

Route::get('administration', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('administration', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::resource('administration/accueil', 'BackController')->middleware('auth');
Route::resource('administration/questionnaire', 'SurveyController')->middleware('auth');
Route::resource('administration/reponses', 'AnswerController')->middleware('auth');
