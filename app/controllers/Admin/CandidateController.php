<?php namespace Admin;

use \BaseController as BaseController;
use \View as View;

class CandidateController extends BaseController {

	private $properties = [
		'id' => [],
		'party_id' => [],
		'nickname' => [],
		'full_name' => [],
		'slogan' => [],
		'picture' => [],
		'birthday' => [],
		'candidate_type_id' => []
	];

	public function getIndex() { return "index"; }
	public function getNew() { return "new"; }
	public function postStore() { return "store"; }
	public function getEdit() { return "edit"; }
	public function getView() { return "view"; }

}
