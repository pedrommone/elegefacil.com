<?php namespace Admin;

use BaseController;

class PartiesController extends BaseController {

	protected $model = 'Party';
	protected $title = 'partidos eleitorais';
	protected $uri = 'parties';

	protected $properties = [
		'id' => [
			'name' => 'Código',
			'type' => 'primary_key',
			'casting' => 'integer',
			'validation' => null,
			'show_list' => true
		],
		'name' => [
			'name' => 'Nome',
			'type' => 'text',
			'casting' => 'string',
			'validation' => 'required|max:45',
			'show_list' => true
		],
		'abbreviation' => [
			'name' => 'Sigla',
			'type' => 'text',
			'casting' => 'string',
			'validation' => 'required|max:10',
			'show_list' => true
		]
	];
}