<?php namespace Admin;

use BaseController;
use CandidateVote;
use CandidateType;
use Voter;
use View;

class ReportsController extends BaseController {

	public function getIndex()
	{

		return View::make('admin.reports.index', [
			'total_votes' => CandidateVote::count(),
			'total_regular_voters' => Voter::where('voted_at', '!=', '0000-00-00 00:00:00')->count(),
			'total_voters' => Voter::count(),
			'candidate_types' => CandidateType::has('Candidates')
				->with('Candidates')->get()->toArray()
		]);
	}
}