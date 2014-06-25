Database Seeder
---------------
```php
<?php

use \Developer;

class DeveloperTableSeeder extends Seeder {

	public function run()
	{
		Developer::truncate();

		Developer::create([
			'email'		 => 'ciaran@ciarandowney.com',
			'username'	 => 'ciarand',
			'password'   => Hash::make('1234'),
		]);
	}
}
