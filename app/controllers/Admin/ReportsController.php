<?php namespace Admin;

use BaseController;
use View;

class ReportsController extends BaseController {

	public function getIndex()
	{

		return View::make('admin.reports.index');
	}
}