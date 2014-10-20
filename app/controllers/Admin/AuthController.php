<?php namespace Admin;

use \BaseController as BaseController;
use Validator;
use Redirect;
use Session;
use Input;
use View;
use User;

class AuthController extends BaseController {

	public function getLogin()
	{

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
			$user = User::where([
				'username' => Input::get('username'),
				'password' => Input::get('password')
			])->first();

			if ($user)
			{
				Session::put('admin_logged_in', 1);
				Session::put('admin_id', $user->id);

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

		Session::put('admin_logged_in', 0);
		Session::put('admin_id', null);

		return Redirect::to('admin/login');
	}

}