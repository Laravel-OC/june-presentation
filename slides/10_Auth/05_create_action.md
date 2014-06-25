Login a user
------------
```php
public function create()
{
	if (Auth::check()) return Redirect::to('/projects');
	return View::make('developers.login');
}
```

