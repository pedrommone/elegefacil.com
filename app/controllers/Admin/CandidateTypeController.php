<?php namespace Admin;

use BaseController;

class CandidateTypeController extends BaseController {

	protected $model = 'CandidateType';
	protected $title = 'cargos';
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
			'validation' => 'required|max:50|alpha_spaces',
			'show_list' => true
		]
	];
}