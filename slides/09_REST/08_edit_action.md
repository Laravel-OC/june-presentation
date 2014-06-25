Show the form for editing a developer
-------------------------------
```php
public function edit($id)
{
	$developer = Developer::findOrFail($id);
	return View::make('developers.edit', compact('developer');
}
```
