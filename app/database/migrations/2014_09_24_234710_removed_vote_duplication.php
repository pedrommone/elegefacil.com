<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemovedVoteDuplication extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::drop('voter_votes');

		Schema::create('candidate_types', function($table) {
			$table->increments('id');
			$table->string('type', 50);
		});

		Schema::table('candidates', function($table) {
			$table->dropColumn('type');
			$table->unsignedInteger('candidate_type_id');

			$table->foreign('candidate_type_id')->references('id')->on('candidate_types');	
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::create('voter_votes', function($table) {
			$table->increments('id');
			$table->unsignedInteger('voter_id');
			$table->enum('type', ['P', 'G', 'S', 'DP', 'DF']);

			$table->timestamps();
			$table->foreign('voter_id')->references('id')->on('voters');
		});

		Schema::table('candidates', function($table) {
			$table->dropForeign('candidate_type_id_foreign');
			$table->enum('type', ['P', 'G', 'S', 'DP', 'DF']);
		});

		Schema::drop('candidate_types');
	}

}
