Show form for creating a new developer
--------------------------------------
```php
<?php

class DevelopersController extends \BaseController {

public function index()
{
	$developers = Developer::all();
	return View::make('developers.index', compact('developers'));
}
```
