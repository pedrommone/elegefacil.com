<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitialSchema extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('parties', function($table) {
			$table->increments('id');
			$table->string('name', 45);
			$table->text('purpose');
			$table->string('logo', 100);
			$table->string('abbreviation', 10);

			$table->timestamps();
			$table->softDeletes();
		});

		Schema::create('candidates', function($table) {
			$table->increments('id');
			$table->unsignedInteger('party_id');
			$table->string('nickname', 30);
			$table->string('full_name', 100);
			$table->string('slogan', 100);
			$table->string('picture', 100);
			$table->timestamp('birthday');
			$table->enum('type', ['P', 'G', 'S', 'DP', 'DF']);

			$table->timestamps();
			$table->softDeletes();
			$table->foreign('party_id')->references('id')->on('parties');
		});

		Schema::create('zones', function($table) {
			$table->increments('id');
			$table->string('state', 100);
			$table->string('city', 100);

			$table->timestamps();
			$table->softDeletes();
		});

		Schema::create('sections', function($table) {
			$table->increments('id');
			$table->unsignedInteger('zone_id');
			$table->string('address', 100);

			$table->timestamps();
			$table->softDeletes();
			$table->foreign('zone_id')->references('id')->on('zones');
		});

		Schema::create('voters', function($table) {
			$table->increments('id');
			$table->unsignedInteger('section_id');
			$table->string('name', 100);
			$table->timestamp('birthday');
			$table->enum('gender', ['M', 'F']);

			$table->timestamps();
			$table->softDeletes();
			$table->foreign('section_id')->references('id')->on('sections');
		});

		Schema::create('candiate_votes', function($table) {
			$table->increments('id');
			$table->unsignedInteger('candidate_id');
			$table->string('city', 100);
			$table->string('state', 100);
			$table->enum('gender', ['M', 'F']);
			$table->unsignedInteger('age');

			$table->timestamps();
			$table->foreign('candidate_id')->references('id')->on('candidates');
		});

		Schema::create('voter_votes', function($table) {
			$table->increments('id');
			$table->unsignedInteger('voter_id');
			$table->enum('type', ['P', 'G', 'S', 'DP', 'DF']);

			$table->timestamps();
			$table->foreign('voter_id')->references('id')->on('voters');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('voter_votes');
		Schema::drop('candiate_votes');
		Schema::drop('voters');
		Schema::drop('sections');
		Schema::drop('zones');
		Schema::drop('candidates');
		Schema::drop('parties');
	}

}
