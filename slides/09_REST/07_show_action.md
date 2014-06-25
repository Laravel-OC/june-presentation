Display the specified developer
-------------------------------
```php
public function show($id)
{
    $dev = Developer::findOrFail($id);

    return View::make('developers.show', ['dev' => $dev]);
}
```
