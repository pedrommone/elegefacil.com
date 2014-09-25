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

Route::get('/', 'Voter\\AuthController@getLogin');

Route::any('deploy', [
	'as' => 'internal.deploy',
	'uses' => 'DeployController@getDeploy'
]);

Route::group([
		'prefix' => 'admin',
		'namespace' => 'Admin'
	],

	function() {

		Route::get('login', [
			'as' => 'admin.login',
			'uses' => 'AuthController@getLogin'
		]);

	}
);

Route::group([
		'prefix' => 'voter',
		'namespace' => 'voter'
	],

	function() {

		Route::get('login', [
			'as' => 'voter.login',
			'uses' => 'AuthController@getLogin'
		]);

	}
);