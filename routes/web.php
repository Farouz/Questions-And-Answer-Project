<?php

//Home Route
Route::get('/','QuestionsController@index');

// Routes of login and logout and register for user
Route::get('register','UsersController@newUser');
Route::post('register','UsersController@create');
Route::get('login','UsersController@login');
Route::post('login','UsersController@loginIn');
Route::get('/logout','UsersController@logout');

//Routes of Questions
Route::group(['middleware'=>'guest'],function (){

    Route::post('/ask','QuestionsController@ask');
    Route::get('/question/{id}','QuestionsController@show');
    Route::get('/your-questions','QuestionsController@your_questions');
    Route::get('/question/{id}/edit','QuestionsController@edit');
    Route::post('/question/{id}/update','QuestionsController@update');
    Route::get('/question/{id}/delete','QuestionsController@destroy');

});

//Routes For Answers
Route::post('/create','AnswersController@create');
//Route for search
Route::post('/search','QuestionsController@search');
Route::group(['middleware'=>'isAdmin'],function (){
    Route::get('/admin','AdminsController@index');
    Route::get('/admin/{id}/delete','AdminsController@destroy');
    Route::get('/admin/{id}/deleteUser','AdminsController@deleteUser');
    Route::post('/admin/{id}/update','AdminsController@makeAdmin');



});