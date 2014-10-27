<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMissingSoftDeletes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		Schema::table('candidate_types', function($table) { $table->softDeletes(); });
		Schema::table('candidate_votes', function($table) { $table->softDeletes(); });

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{ 

		Schema::table('candidate_types', function($table) { $table->dropColumn('deleted_at'); });
		Schema::table('candidate_votes', function($table) { $table->dropColumn('deleted_at'); });
	}

}
