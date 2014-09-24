<?php

class DeployController extends BaseController {

	public function getDeploy() {

		try {
			Artisan::call('deploy:make');

			Log::info('Deployment procedure done.');

			Response::json([
				'status' => 'ok',
				'message' => 'Everything went well.'
			], 200);

		} catch (Exception $e) {
			Log::error('Hey, something went very wrong with deployment.');

			Response::json([
				'status' => 'error',
				'message' => 'Something went very wrong.'
			], 500);
		}
		
	}

}
