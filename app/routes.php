<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
// to check the enviornment 
// echo app('env');
Route::get('/', function()
{
	return View::make('hello');
});
Route::get('/home',function()
{
	return View::make('pages.home');
});
Route::get('/about',function()
{
	return View::make('pages.about');
});