<?php

use \Developer;

class DeveloperTableSeeder extends Seeder {

	public function run()
	{
		Developer::truncate();

		Developer::create([
			'first_name' => 'Ciaran',
			'last_name'  => 'Downey',
		]);

		Developer::create([
			'first_name' => 'Justin',
			'last_name'  => 'Page',
		]);

		Developer::create([
			'first_name' => 'Benjamin',
			'last_name'  => 'Walters',
		]);
	}

}
