Show the form for editing a developer
-------------------------------------
```php
public function edit($id)
{
    $dev = Developer::findOrFail($id);

    return View::make('developers.edit', ["dev" => $dev]);
}
```
