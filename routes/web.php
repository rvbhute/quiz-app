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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/questions/new', 'QuestionsController@showNewQuestionForm');
Route::get('/questions', 'QuestionsController@index');
Route::post('/questions', 'QuestionsController@saveNewQuestion');
Route::get('/questions/{id}', 'QuestionsController@viewQuestion');
Route::get('/questions/{id}/edit', 'QuestionsController@viewQuestionEditForm');
Route::post('/questions/{id}', 'QuestionsController@saveQuestion');
