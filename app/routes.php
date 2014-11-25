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
	return Redirect::to('/home');
});
Route::get('/home',function()
{
	return View::make('pages.home');
});
Route::get('/about',function()
{
	return View::make('pages.about');
});
Route::get('/seed',function(){
	$user  = new User;

	$user->firstname = 'vishnu';
	$user->lastname ='kanduri';
	$user->email = 'vishnu.kvs@gmail.com';
	$user->password = Hash::make('computer');
	$user->save();
});
Route::get('/signin',function(){
	return View::make('users.sigin');
});
Route::resource('/users','UsersController');
	//Route::post('signin','SessionsController@store');
Route::resource('sessions','SessionsController');
