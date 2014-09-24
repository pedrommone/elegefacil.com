<?php

class DeployController extends BaseController {

	public function getDeploy() {

		try {
			Artisan::call('deploy:make');

			Log::info('Deployment procedure done.');
		} catch (Exception $e) {
			Log::error('Hey, something went very wrong with deployment.');
		}
		
	}

}
