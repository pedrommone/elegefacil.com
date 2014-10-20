<?php namespace Admin;

use BaseController;
use Validator;
use Redirect;
use Session;
use Input;
use View;
use User;

class CandidateTypeController extends BaseController {

	protected $model = 'CandidateType';
	protected $title = 'tipo de candidados';
	protected $uri = 'candidate-type';

	protected $properties = [
		'id' => [
			'name' => 'Código',
			'type' => 'primary_key',
			'casting' => 'integer',
			'validation' => null,
			'show_list' => true
		],
		'type' => [
			'name' => 'Descrição',
			'type' => 'text',
			'casting' => 'string',
			'validation' => 'required|max:50',
			'show_list' => true
		]
	];

}