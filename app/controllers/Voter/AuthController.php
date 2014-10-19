<?php namespace Voter;

use \BaseController as BaseController;
use \Validator as Validator;
use \Redirect as Redirect;
use \Session as Session;
use \Input as Input;
use \Voter as Voter;
use \View as View;

class AuthController extends BaseController {

	public function getLogin()
	{
		return View::make('voter.login.index');
	}

	public function postLogin()
	{
		$validator = Validator::make(Input::all(),
			array('id' => 'required'),
			array('birthday' => 'required')
		);

		if ($validator->fails())
		{
			return Redirect::back()
				->withErrors($validator);
		}
		else
		{
			$voter = Voter::where([
				'id' => Input::get('id'),
				'birthday' => Input::get('birthday')
			])->first();

			if ($voter)
			{
				Session::put('voter_logged_in', 1);
				Session::put('voter_id', $voter->id);

				return Redirect::to('voter/dashboard');
			}
			else
			{
				$errors = new \Illuminate\Support\MessageBag;
				$errors->add('error', 'Credenciais inválidas.');

				return Redirect::back()
					->withErrors($errors);
			}
		}
	}

	public function getLogout() {
		Session::put('voter_logged_in', 0);
		Session::put('voter_id', null);

		return Redirect::to('voter/login');
	}

}
