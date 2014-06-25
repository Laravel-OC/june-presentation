Display the specified developer
-------------------------------
```php
public function show($id)
{
	$developer = Developer::findOrFail($id);
	return View::make('developers.show', compact('developer');
}
```
