<?php namespace Voter;

use BaseController;
use View;

class DashboardController extends BaseController {

	public function getIndex()
	{

		return View::make('voter.dashboard.index');
	}
}