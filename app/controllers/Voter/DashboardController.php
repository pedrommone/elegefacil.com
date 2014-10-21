<?php namespace Voter;

use BaseController;
use CandidateType;
use CandidateVote;
use Candidate;
use Response;
use Session;
use Voter;
use Input;
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

	public function postVote()
	{

		if (Input::has('votes'))
		{

			$votes = Input::get('votes');

			$voter = Voter::with('Section', 'Section.Zone')
				->findOrFail(Session::get('voter_id'));

			foreach ($votes as $candidate_target)
			{

				$candidate = Candidate::find($candidate_target);

				if ($candidate)
				{

					$vote = new  CandidateVote;

					$vote->candidate_id = $candidate->id;
					$vote->city = $voter->section->zone->city;
					$vote->state = $voter->section->zone->state;
					$vote->gender = $voter->gender;
					$vote->age = 20;

					$vote->save();

					unset($vote);
				}
			}
		}
	}
}