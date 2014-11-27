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
Route::get('/signup',function(){
	return View::make('users.signup');
});
Route::resource('/users','UsersController');
	//Route::post('signin','SessionsController@store');
	//
Route::resource('sessions','SessionsController');
Route::get('login/fb', function() {
    $facebook = new Facebook(Config::get('facebook'));
    $params = array(
        'redirect_uri' => url('/login/fb/callback'),
        'scope' => 'email',
    );
    return Redirect::to($facebook->getLoginUrl($params));
});

Route::get('fbauth/{auth?}',array('as'=>'facebookAuth','uses'=>'SessionsController@getFacebooklogin'));
Route::get('twitterAuth/{auth?}',array('as'=>'twitterAuth','uses'=>'SessionsController@getTwitterLogin'));
Route::get('logout',array('as'=>'logout','uses'=>'SessionsController@getLogout'));



Route::get('social/{action?}', array("as" => "hybridauth", function($action = "")
{
    // check URL segment
    if ($action == "auth") {
        // process authentication
        try {
            Hybrid_Endpoint::process();
        }

        catch (Exception $e) {
            // redirect back to http://URL/social/
            return Redirect::route('hybridauth');
        }
        return;
    }

    try {
        // create a HybridAuth object
        $socialAuth = new Hybrid_Auth(app_path() . '/config/hybridauth.php');
        // authenticate with Facebook
        $provider = $socialAuth->authenticate("Facebook");
        // fetch user profile
        $userProfile = $provider->getUserProfile();
    }

    catch(Exception $e) {
        // exception codes can be found on HybBridAuth's web site
        return $e->getMessage();
    }

    // access user profile data
    echo "Connected with: <b>{$provider->id}</b><br />";
    echo "As: <b>{$userProfile->displayName}</b><br />";
    echo "<pre>" . print_r( $userProfile, true ) . "</pre><br />";

    // logout
    $provider->logout();
}));