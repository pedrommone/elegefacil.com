<?php namespace Voter;

use BaseController;
use CandidateType;
use Response;
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

	public function getUrna()
	{

		return View::make('voter.dashboard.urna');
	}

	public function getCandidates()
	{

		$candidates = CandidateType::has('Candidates')
			->with('Candidates', 'Candidates.Party')
			->get();

		return Response::json($candidates);
	}
}