<?php

set_time_limit(-1);

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class TransparenciaCandidatos extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'transparencia:candidatos';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Carrega os candidatos do portal de transparencia.';

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

		//$this->info($api_endpoint . '?' . http_build_query($params));

		$ch = curl_init($api_endpoint . '?' . http_build_query($params));
		curl_setopt($ch, CURLOPT_HTTPGET, TRUE);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'App-Token: '.$app_token,
			'Content-Type: application/json',
			'Accept: application/json'
		));

		$response = json_decode(curl_exec($ch));

		curl_close($ch);

		return $response;
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{

		$this->info('Iniciando a requisição para o webservice');

		$this->info('Carregando a lista de estados');
		$estados = $this->makeRequest('estados');
		$this->info('Foram encontrados ' . count($estados) . ' estados');

		$this->info('Carregando a lista de cargos');
		$cargos = CandidateType::all()->lists('id', 'type');
		$this->info('Foram encontrados ' . count($cargos) . ' cargos');

		$this->info('Carregando a lista de partidos');
		$partidos = Party::all()->lists('id', 'abbreviation');
		$this->info('Foram encontrados ' . count($partidos) . ' partidos');

		foreach ($estados as $estado_id => $estado)
		{

			$this->info("Carregando os candidatos de $estado->sigla ($estado_id/" . count($estado) . ")");

			foreach ($cargos as $cargo_nome => $cargo_id)
			{

				$this->info('- Procurando por ' . $cargo_nome);

				$candidatos = $this->makeRequest('candidatos', [
					'estado' => $estado->sigla,
					'cargo' => $cargo_id
				]);

				foreach ($candidatos as $candidato)
				{

					$candidate = Candidate::where('full_name', $candidato->nome)
						->first();

					if (! $candidate)
					{

						$this->info('-- Processando ' . $candidato->nome . '/' . $candidato->apelido);

						$picture_hash = Str::random(90) . ".jpg";

						file_put_contents(app_path() . '/../www/uploads/' . $picture_hash, file_get_contents($candidato->foto));

						Candidate::create([
							'party_id' => $partidos[$candidato->partido],
							'candidate_type_id' => $cargos[ucfirst(strtolower(str_replace('º', '', (string) $candidato->cargo)))],
							'nickname' => $candidato->apelido,
							'full_name' => $candidato->nome,
							'picture' => $picture_hash
						]);
					}
				}

				//$this->info('Foram encontrados ' . count($candidatos) . ' candidatos');
			}
		}
	}

}