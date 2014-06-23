<?php

use \Project;
use \Carbon;

class ProjectTableSeeder extends Seeder {

	public function run()
	{
		Project::truncate();

		Project::create([
			'project_name' => 'Laravel Presentation',
			'developer_id'  => 1,
			'due_date' => Carbon::createFromDate(2014, 7, 4, 'America/Los_Angeles'),
		]);

		Project::create([
			'project_name' => 'PDO Implementation',
			'developer_id'  => 3,
			'due_date' => Carbon::createFromDate(2015, 1, 1, 'America/Los_Angeles'),
		]);

		Project::create([
			'project_name' => 'Authentication Module',
			'developer_id'  => 1,
			'due_date' => Carbon::createFromDate(2014, 8, 1, 'America/Los_Angeles'),
		]);
	}

}
