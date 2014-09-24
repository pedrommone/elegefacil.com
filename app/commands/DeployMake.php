<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class DeployMake extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'deploy:make';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Connect into SSH server and make deploy procedure.';

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
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{

		$commands = array(
			'cd /home/se/web/santosedificacoes.com/',
	    	'php artisan down',
	    	'php artisan clear-compiled',
			'git pull origin master',
			'php -d memory_limit=-1 composer install --no-scripts',
			'php artisan migrate',
			'php artisan optimize',
			'php artisan up'
		);

		SSH::run($commands);
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array();
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array();
	}

}