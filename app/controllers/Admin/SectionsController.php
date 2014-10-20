<?php namespace Admin;

use BaseController;

class SectionsController extends BaseController {

	protected $model = 'Section';
	protected $title = 'seções eleitorais';
	protected $uri = 'sections';

	protected $properties = [
		'id' => [
			'name' => 'Código',
			'type' => 'primary_key',
			'casting' => 'integer',
			'show_list' => true,
		],
		'zone_id' => [
			'name' => 'Zona eleitoral',
			'type' => 'relationship',
			'casting' => 'integer',
			'validation' => 'required|integer',
			'show_list' => true,
			'model' => 'Zone',
			'model_desc' => 'id'
		],
		'address' => [
			'name' => 'Endereço',
			'type' => 'text',
			'casting' => 'string',
			'validation' => 'required|max:100',
			'show_list' => true
		]
	];
}