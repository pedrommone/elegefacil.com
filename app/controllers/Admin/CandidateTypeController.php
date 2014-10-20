<?php namespace Admin;

use \BaseController as BaseController;
use Validator;
use Redirect;
use Input;
use View;

class CandidateTypeController extends BaseController {

	private $model = 'CandidateType';
	private $title = 'tipo de candidados';
	private $uri = 'candidate-type';

	private $properties = [
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

	public function getIndex()
	{

		return View::make('admin.scaffolding.list', [
			'title' => $this->title,
			'data' => (new $this->model)->all(),
			'properties' => $this->properties,
			'uri' => $this->uri
		]);
	}

	public function getDelete($id)
	{

		$target = (new $this->model)->find($id);
		$bag = new \Illuminate\Support\MessageBag;

		if ($target)
		{
			$target->delete();

			$bag->add('success', 'Excluido com sucesso.');

			return Redirect::to("admin/$this->uri")
				->with('success', $bag);
		}
		else
		{			
			$bag->add('error', 'Código inválido.');

			return Redirect::to("admin/$this->uri")
				->withErrors($bag);
		}
	}

	public function getNew()
	{

		return View::make('admin.scaffolding.new', [
			'uri' => $this->uri,
			'title' => $this->title,
			'properties' => $this->properties
		]);
	}

	public function postStore()
	{
		$validate_rules = [];

		foreach ($this->properties as $k => $v)
			$validate_rules = [
				$k => $v['validation']
			];

		$validator = Validator::make(Input::all(), $validate_rules);

		if ($validator->fails())
		{
			return Redirect::back()
				->withErrors($validator);
		}
		else
		{
			$obj = (new $this->model);

			foreach ($this->properties as $key => $value)
				$obj->$key = Input::get($key);

			$obj->save();

			$bag = new \Illuminate\Support\MessageBag;
			$bag->add('success', 'Adicionado com sucesso.');

			return Redirect::to("admin/$this->uri")
				->with('success', $bag);
		}
	}

	public function getView($id)
	{
		$target = (new $this->model)->find($id);

		if ($target)
		{
			return View::make('admin.scaffolding.view', [
				'uri' => $this->uri,
				'title' => $this->title,
				'properties' => $this->properties,
				'target' => $target
			]);
		}
		else
		{
			$bag = new \Illuminate\Support\MessageBag;
			$bag->add('error', 'Código inválido.');

			return Redirect::to("admin/$this->uri")
				->withErrors($bag);
		}
	}

	public function getEdit() { return "edit"; }

}