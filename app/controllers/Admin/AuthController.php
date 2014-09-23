<?php namespace Admin;

use \BaseController as BaseController;
use \View as View;

class AuthController extends BaseController {

	public function getLogin() {
		return View::make('admin.login.index');
	}

}
