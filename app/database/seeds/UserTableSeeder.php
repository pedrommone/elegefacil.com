<?php

class UserTableSeeder extends Seeder
{

	public function run()
	{

		DB::table('users')->delete();

		User::create([
			'username' => 'pedro',
			'password' => Hash::make('123123')
		]);
	}

}