<?php namespace Voter;

use \View as View;
use \Input as Input;
use \Voter as Voter;
use \Session as Session;
use \Redirect as Redirect;
use \Validator as Validator;
use \BaseController as BaseController;

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
				\Session::put('voter_logged_in', 1);
				return \Redirect::to('voter/dashboard');
			}
			else
			{
				$errors = new \Illuminate\Support\MessageBag;
				$errors->add('error', 'Credenciais inválidas.');

				return \Redirect::back()
					->withErrors($errors);
			}
		}
	}

}
