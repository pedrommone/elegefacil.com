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

Route::get('/', function(){ return Redirect::route('voter.login'); });

Route::any('deploy', [
	'as' => 'internal.deploy',
	'uses' => 'DeployController@getDeploy'
]);

Route::group([
		'prefix' => 'admin',
		'namespace' => 'Admin'
	],

	function() {

		Route::get('/', function(){ return Redirect::route('admin.login'); });

		Route::get('login', [
			'as' => 'admin.login',
			'uses' => 'AuthController@getLogin'
		]);

		Route::controller('candidate-type', 'CandidateTypeController');
		Route::controller('candidate-votes', 'CandidateVotesController');
		Route::controller('candidate', 'CandidateController');
		Route::controller('candidate-parties', 'CandidatePartiesController');
		Route::controller('sections', 'SectionsController');
		Route::controller('users', 'UsersController');
		Route::controller('voters', 'VotersController');
		Route::controller('zones', 'ZonesController');

	}
);

Route::group([
		'prefix' => 'voter',
		'namespace' => 'Voter'
	],

	function() {

		Route::get('/', function(){ return Redirect::route('voter.login'); });

		Route::get('login', [
			'as' => 'voter.login',
			'uses' => 'AuthController@getLogin'
		]);

		Route::post('login', [
			'as' => 'voter.validate',
			'uses' => 'AuthController@postLogin'
		]);	

		Route::group(['before', 'auth.voter'], function() {

			Route::get('dashboard', function() {
				return "dashboard";
			});

		});

	}
);