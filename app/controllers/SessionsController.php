<?php

class SessionsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.sigin');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		if(Auth::attempt(Input::only('email','password')))

		{
			return "Welcome".Auth::user()->email;
		}
		return 'failed';

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		return 'sessions need to be destroyed';
	}

	public function getFacebooklogin($auth=NULL)
	{
		if($auth == 'auth')
		{
			try
			{
				Hybrid_Endpoint::process();
			}
			catch (Exception $e)
			{
				return Redirect::to('hello');
			}
			return;
		}
		$oauth = new Hybrid_Auth(app_path().'/config/facebook.php');
		$provider = $oauth->authenticate('Facebook');
		$profile = $provider->getUserProfile();
		return $profile->email.'<a href="logout">Logout</a>';
		//	return var_dump($profile).'<a href="logout">Logout</a>';
	}

	public function getTwitterLogin($auth=NULL)
	{
		if($auth == 'auth')
		{
			try
			{
				Hybrid_Endpoint::process();
			}
			catch (Exception $e)
			{
				return Redirect::to('home');
			}
			return;
		}
		$oauth = new Hybrid_Auth(app_path().'/config/twitter_auth.php');
		$provider = $oauth->authenticate('Twitter');
		$profile = $provider->getUserProfile();
		return $profile->firstname.'<a href="logout">Logout</a>';

		//return var_dump($profile).'<a href="logout">Logout</a>';
	}

	public function getLogout()
	{
		//$oauth = new Hybrid_Auth(app_path().'/config/facbook.php');
		//$fauth->logoutAllProviders();
		//Hybrid_Provider_Adapter::logout();
		
		Auth::logout();
		Session::flush();
		return Redirect::to('home');
	}

}