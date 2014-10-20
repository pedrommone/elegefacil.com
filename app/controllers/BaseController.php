<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	/**
	 * Monta a lista de itens do banco de dados
	 *
	 * @return void
	 */
	public function getIndex()
	{

		return View::make('admin.scaffolding.list', [
			'title' => $this->title,
			'data' => (new $this->model)->all(),
			'properties' => $this->properties,
			'uri' => $this->uri
		]);
	}

	/**
	 * Deleta um item do banco de dados
	 *
	 * @return void
	 */
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

	/**
	 * Monta a view para adicionar um item no banco de dados
	 *
	 * @return void
	 */
	public function getNew()
	{

		return View::make('admin.scaffolding.new', [
			'uri' => $this->uri,
			'title' => $this->title,
			'properties' => $this->properties
		]);
	}

	/**
	 * Salva/edita objeto do banco de dados
	 *
	 * @return void
	 */
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
				->withInput()
				->withErrors($validator);
		}
		else
		{
			$obj = (new $this->model);

			if (Input::has('id'))
				$obj = (new $this->model)->find(Input::get('id'));

			if ($obj)
			{
				foreach ($this->properties as $key => $value)
					switch ($value['type'])
					{
						case 'primary_key':
							break;

						case 'password':
							$obj->$key = Hash::make(Input::get($key));
							break;

						default:
							$obj->$key = Input::get($key);
					}

				$obj->save();

				$bag = new \Illuminate\Support\MessageBag;
				$bag->add('success', 'Adicionado com sucesso.');

				return Redirect::to("admin/$this->uri")
					->with('success', $bag);
			}
			else
			{
				$bag = new \Illuminate\Support\MessageBag;
				$bag->add('error', 'Código inválido.');

				return Redirect::to("admin/$this->uri")
					->withErrors($bag);
			}
		}
	}

	/**
	 * Monta a view com os dados a serem exibidos
	 *
	 * @return void
	 */
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

	/**
	 * Monta a view para editar um objeto
	 *
	 * @return void
	 */
	public function getEdit($id)
	{
		$target = (new $this->model)->find($id);

		if ($target)
		{
			return View::make('admin.scaffolding.new', [
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

}
