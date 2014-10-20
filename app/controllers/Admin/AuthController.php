<?php namespace Admin;

use BaseController;
use Validator;
use Redirect;
use Session;
use Input;
use View;
use Auth;
use User;

class AuthController extends BaseController {

	public function getLogin()
	{

		if (! Auth::guest())
			return Redirect::to('admin/dashboard');
		
		return View::make('admin.login.index');
	}

	public function postLogin()
	{

		$validator = Validator::make(Input::all(),
			array('username' => 'required'),
			array('password' => 'required')
		);

		if ($validator->fails())
		{
			return Redirect::back()
				->withErrors($validator);
		}
		else
		{

			if (Auth::attempt([
				'username' => Input::get('username'),
				'password' => Input::get('password')
			]))
			{

				return Redirect::to('admin/dashboard');
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

	public function getLogout()
	{

		Auth::logout();

		return Redirect::to('admin/login');
	}
}