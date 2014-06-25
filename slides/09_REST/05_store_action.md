Store a newly created developer in storage
-----------------------------------------
```php
public function store()
{
	$developer = new developer;
	$developer->first_name = input::only("first_name");
	$developer->last_name = input::only("last_name");
	$developer->save();

	return redirect::route('developers.index');
}
```

