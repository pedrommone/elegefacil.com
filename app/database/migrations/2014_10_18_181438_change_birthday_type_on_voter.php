<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeBirthdayTypeOnVoter extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('voters', function($table) {
			$table->dropColumn('birthday');
		});

		Schema::table('voters', function($table) {
			$table->string('birthday', 8);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{	
		Schema::table('voters', function($table) {
			$table->dropColumn('birthday');
		});

		Schema::table('voters', function($table) {
			$table->timestamp('birthday');
		});
	}

}
