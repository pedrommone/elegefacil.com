<?php namespace Admin;

use BaseController;

class CandidatesController extends BaseController {

	protected $model = 'Candidate';
	protected $title = 'candidatos eleitorais';
	protected $uri = 'candidates';

	protected $properties = [
		'id' => [
			'name' => 'Código',
			'type' => 'primary_key',
			'casting' => 'integer',
			'show_list' => true,
		],
		'party_id' => [
			'name' => 'Partido',
			'type' => 'relationship',
			'casting' => 'integer',
			'validation' => 'required|integer',
			'show_list' => true,
			'model' => 'Party',
			'model_desc' => 'abbreviation'
		],
		'candidate_type_id' => [
			'name' => 'Cargo',
			'type' => 'relationship',
			'casting' => 'integer',
			'validation' => 'required|integer',
			'show_list' => true,
			'model' => 'CandidateType',
			'model_desc' => 'type'
		],
		'nickname' => [
			'name' => 'Apelido',
			'type' => 'text',
			'casting' => 'string',
			'validation' => 'required|min:1|max:30|alpha_spaces',
			'show_list' => true
		],
		'full_name' => [
			'name' => 'Nome',
			'type' => 'text',
			'casting' => 'string',
			'validation' => 'required|min:1|max:100|alpha_spaces',
			'show_list' => true
		],
		'picture' => [
			'name' => 'Foto',
			'type' => 'file',
			'casting' => 'file',
			'validation' => 'required',
			'show_list' => false
		],
	];
}