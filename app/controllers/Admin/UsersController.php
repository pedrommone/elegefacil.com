<?php namespace Admin;

use BaseController;

class UsersController extends BaseController {

	protected $model = 'User';
	protected $title = 'administradores';
	protected $uri = 'users';

	protected $properties = [
		'id' => [
			'name' => 'Código',
			'type' => 'primary_key',
			'casting' => 'integer',
			'validation' => null,
			'show_list' => true
		],
		'username' => [
			'name' => 'Usuário',
			'type' => 'text',
			'casting' => 'string',
			'validation' => 'required|min:1|max:50|alpha_spaces',
			'show_list' => true
		],
		'password' => [
			'name' => 'Senha',
			'type' => 'password',
			'casting' => 'string',
			'validation' => 'required|min:1|max:30',
			'show_list' => false,
			'hide_view' => true
		]
	];
}