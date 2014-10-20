<?php namespace Admin;

use BaseController;

class VotersController extends BaseController {

	protected $model = 'Voter';
	protected $title = 'eleitores';
	protected $uri = 'voters';

	protected $properties = [
		'id' => [
			'name' => 'Código',
			'type' => 'primary_key',
			'casting' => 'integer',
			'show_list' => true,
		],
		'section_id' => [
			'name' => 'Sessão eleitoral',
			'type' => 'relationship',
			'casting' => 'integer',
			'validation' => 'required|integer',
			'show_list' => true,
			'model' => 'Section',
			'model_desc' => 'id'
		],
		'name' => [
			'name' => 'Nome',
			'type' => 'text',
			'casting' => 'string',
			'validation' => 'required|max:100',
			'show_list' => true
		],
		'gender' => [
			'name' => 'Sexualidade',
			'type' => 'select',
			'casting' => 'string',
			'validation' => 'required',
			'show_list' => true,
			'options' => ['M' => 'Masculino', 'F' => 'Feminino']
		],
		'birthday' => [
			'name' => 'Data de nascimento',
			'type' => 'text',
			'casting' => 'string',
			'validation' => 'required|min:8|max:8',
			'placeholder' => 'dd/mm/aaaa',
			'show_list' => true
		]
	];
}