<?php namespace Admin;

use \BaseController as BaseController;
use \View as View;

class CandidatePartiesController extends BaseController {

	public function getNew() { return "new"; }
	public function postStore() { return "store"; }
	public function getEdit() { return "edit"; }
	public function getView() { return "view"; }

}
