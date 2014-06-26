Display the specified developer
-------------------------------
```php
public function show($id)
{
    // shows a 404 if it fails
    $dev = Developer::findOrFail($id);

    return View::make('developers.show', ['dev' => $dev]);
}
```
