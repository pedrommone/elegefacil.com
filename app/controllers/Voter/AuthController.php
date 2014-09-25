<?php namespace Voter;

use \BaseController as BaseController;
use \View as View;

class AuthController extends BaseController {

	public function getLogin() {
		return View::make('voter.login.index');
	}

}
