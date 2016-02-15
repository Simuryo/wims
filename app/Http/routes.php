<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

	/*
	 * --------------------------------------------------------------------------
	 *  Root Route
	 * --------------------------------------------------------------------------
	 * 
	 * 
	 */

		Route::get('/', [
			'as'   => '/',
			'uses' => 'RootController@index'
		]);

		//Route::get('/app/{app}', 'RootController@app');	


	/*
	 * --------------------------------------------------------------------------
	 *  Authentication Routes
	 * --------------------------------------------------------------------------
	 * 
	 * Authentication routes manuallly called to setup custom user login.
	 * 
	 * 
	 */

		Route::get('login', [
			'as'   => 'getLogin',
			'uses' => 'Auth\AuthController@getLogin'
		]);
		Route::get('auth/login', 'Auth\AuthController@getLogin');


		Route::post('login', [
			'as'   => 'postLogin',
			'uses' => 'Auth\AuthController@postLogin'
		]);
		Route::post('auth/login', 'Auth\AuthController@postLogin');

		Route::get('logout', [
			'as'   => 'getLogout',
			'uses' => 'Auth\AuthController@getLogout'
		]);

		Route::get('auth/logout', 'Auth\AuthController@getLogout');



	/*
	 * --------------------------------------------------------------------------
	 *  Registration Routes
	 * --------------------------------------------------------------------------
	 * 
	 * Registration routes manually configured to setup custom user registration.
	 * 
	 */

		Route::get('register', [
			'as'   => 'getRegister',
			'uses' => 'Auth\AuthController@getRegister'
		]);
		Route::get('auth/register', 'Auth\AuthController@getRegister');

		Route::post('registe', [
			'as'   => 'postRegister',
			'uses' => 'Auth\AuthController@postRegister'
		]);
		Route::post('auth/register', 'Auth\AuthController@postRegister');



	/*
	 * --------------------------------------------------------------------------
	 *  Password Routes
	 * --------------------------------------------------------------------------
	 * 
	 * Handles forgot password feature and remember me.
	 * 
	 * 
	 */
		Route::controllers([
			'password' => 'Auth\PasswordController',
		]);



	/*
	 * --------------------------------------------------------------------------
	 *  Authentication Group Routes
	 * --------------------------------------------------------------------------
	 * 
	 * Routes within this group need authentication to access.
	 * 
	 */

		Route::group(['middleware' => 'auth'], function(){

			Route::group(['middleware' => 'hhway.users'], function(){

				Route::get('/hhway', 'HealthHighWayController@index');

				Route::get('/hhway/referrals/created', 'ReferralController@created');


				Route::get('/hhway/referrals/create/get_receivers', 'ReferralController@get_receivers');

				Route::get('/hhway/referrals/read/{referral}', 'ReferralController@read');

				Route::resource('/hhway/referrals', 'ReferralController');

			});


			Route::group(['middleware' => 'wims.users'], function(){

				/*
				 * Route for Root page of WIMS
				 * ------------------------------------------------------------------------------------------
				 */
					Route::get('/wims', 'Wims\WimsController@index');


				/*
				 * Route for Item Category 
				 * ------------------------------------------------------------------------------------------
				 */
					Route::get('/wims/items/category/loadData', 'Wims\ItemCategoryController@loadData');
					
					Route::resource('/wims/items/category', 'Wims\ItemCategoryController');


				/*
				 * Route for Item Category 
				 * ------------------------------------------------------------------------------------------
				 */
					Route::get('/wims/items/loadData', 'Wims\ItemsController@loadData');

					Route::resource('/wims/items', 'Wims\ItemsController');


			});

		});
