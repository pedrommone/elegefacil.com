<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class TransparenciaCargos extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'transparencia:cargos';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Carrega os cargos do portal de transparencia.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{

		parent::__construct();
	}

	/**
	 * Monta a requisição para a API.
	 *
	 * @return array
	 */
	private function makeRequest($endpoint, $params = [])
	{

		$api_endpoint = 'http://api.transparencia.org.br/api/v1/' . $endpoint;
		$app_token = 'YnMjCEoMsbfn';

		$ch = curl_init($api_endpoint . http_build_query($params));
		curl_setopt($ch, CURLOPT_HTTPGET, TRUE);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'App-Token: '.$app_token,
			'Content-Type: application/json',
			'Accept: application/json'
		));

		return json_decode(curl_exec($ch));
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{

		$this->info('Iniciando a requisição para o webservice');

		$cargos = $this->makeRequest('cargos');

		$this->info('Foram encontrados ' . count($cargos) . ' cargos.');

		foreach ($cargos as $cargo)
			CandidateType::create([
				'type' => ucfirst(strtolower(str_replace('º', '', (string) $cargo->nome)))
			]);

		$this->info('Procedimento concluido com sucesso');

	}

}