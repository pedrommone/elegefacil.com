<?php namespace Voter;

use BaseController;
use Session;
use Voter;
use View;

class DashboardController extends BaseController {

	public function getIndex()
	{

		$voter = Voter::with('Section')
			->findOrFail(Session::get('voter_id'));

		return View::make('voter.dashboard.index', [
			'voter' => $voter
		]);
	}
}