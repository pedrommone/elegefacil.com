<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemovePurposeFromParties extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('parties', function($table)
		{

			$table->dropColumn('purpose');
			$table->dropColumn('logo');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		
		Schema::table('parties', function($table)
		{

			$table->text('purpose');
			$table->string('logo', 100);
		});
	}

}
