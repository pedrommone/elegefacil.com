<?php namespace Admin;

use \BaseController as BaseController;
use Candidate;
use View;

class CandidateController extends BaseController {

	private $model = 'Candidate';
	private $title = 'Candidados';
	private $properties = [
		'id' => [
			'type' => 'primary_key',
			'casting' => 'integer',
			'validation' => null,
			'show_list' => true
		],
		'party_id' => [
			'type' => 'relationship',
			'relationship' => 'Party',
			'casting' => 'integer',
			'validation' => 'required|integer',
			'show_list' => false
		],
		'nickname' => [
			'type' => 'text',
			'casting' => 'string',
			'validation' => 'required|max:30',
			'show_list' => true
		],
		'full_name' => [
			'type' => 'text',
			'casting' => 'string',
			'validation' => 'required|max:100',
			'show_list' => true
		],
		'slogan' => [
			'type' => 'text',
			'casting' => 'string',
			'validation' => 'required|max:100',
			'show_list' => true
		],
		'picture' => [
			'type' => 'image',
			'casting' => 'image',
			'validation' => 'required',
			'show_list' => false
		],
		'birthday' => [
			'type' => 'text',
			'casting' => 'string',
			'validation' => 'required',
			'show_list' => false
		],
		'candidate_type_id' => [
			'type' => 'relationship',
			'relationship' => 'CadidateType',
			'casting' => 'integer',
			'validation' => 'required|integer',
			'show_list' => false
		]
	];

	public function getIndex()
	{

		return View::make('admin.scaffolding.list', [
			'title' => $this->title,
			'data' => (new $this->model)->all()
		]);
	}

	public function getNew() { return "new"; }
	public function postStore() { return "store"; }
	public function getEdit() { return "edit"; }
	public function getView() { return "view"; }

}
