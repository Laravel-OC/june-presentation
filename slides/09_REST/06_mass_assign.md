You may want to take advantage of Mass Assignment
------------------------------------------------
```php
public function store()
{
	Developer::create(Input::all());
	return redirect::route('developers.index');
}
```

Guard against MA vulnerability with whitelist

```php
<?php

class Developer extends Eloquent {
	protected $fillable = ['first_name', 'last_name'];
}
```
