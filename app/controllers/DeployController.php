<?php

class DeployController extends BaseController {

	public function getDeploy() {
		
		Artisan::call('deploy:make');
	}

}
