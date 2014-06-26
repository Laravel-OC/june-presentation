Show the form for editing a developer
-------------------------------------
```php
public function edit($id)
{
    // shows a 404 if it fails
    $dev = Developer::findOrFail($id);

    return View::make('developers.edit', ["dev" => $dev]);
}
```
