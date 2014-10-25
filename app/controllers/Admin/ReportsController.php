<?php namespace Admin;

use BaseController;
use CandidateVote;
use CandidateType;
use View;

class ReportsController extends BaseController {

	public function getIndex()
	{

		return View::make('admin.reports.index', [
			'total_votes' => CandidateVote::count(),
			'candidate_types' => CandidateType::has('Candidates')
				->with('Candidates')->get()->toArray()
		]);
	}
}