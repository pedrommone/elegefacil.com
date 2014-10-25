<?php namespace Admin;

use BaseController;

class ZonesController extends BaseController {

	protected $model = 'Zone';
	protected $title = 'zonas eleitorais';
	protected $uri = 'zones';

	protected $properties = [
		'id' => [
			'name' => 'Código',
			'type' => 'primary_key',
			'casting' => 'integer',
			'validation' => null,
			'show_list' => true
		],
		'state' => [
			'name' => 'Estado',
			'type' => 'text',
			'casting' => 'string',
			'validation' => 'required|max:100|alpha_spaces',
			'show_list' => true
		],
		'city' => [
			'name' => 'Cidade',
			'type' => 'text',
			'casting' => 'string',
			'validation' => 'required|max:100|alpha_spaces',
			'show_list' => true
		]
	];
}