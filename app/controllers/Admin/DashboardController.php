<?php namespace Admin;

use BaseController;
use CandidateType;
use Candidate;
use Section;
use Party;
use Voter;
use View;
use Zone;

class DashboardController extends BaseController {

	public function getIndex()
	{
		
		return View::make('admin.dashboard.index', [
			'count_candidate_types' => CandidateType::count(),
			'count_candidates' => Candidate::count(),
			'count_parties' => Party::count(),
			'count_sections' => Section::count(),
			'count_voters' => Voter::count(),
			'count_zones' => Zone::count()
		]);
	}
}