<?php namespace Admin;

use \BaseController as BaseController;
use \View as View;

class DashboardController extends BaseController {

	public function getIndex()
	{
		return View::make('admin.dashboard.index');
	}

}
