<?php namespace Voter;

use BaseController;
use View;

class CandidateVotesController extends BaseController {

	public function getIndex()
	{
		
		return View::make('voter.dashboard.index');
	}
}