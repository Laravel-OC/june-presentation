Show form for creating a new developer
--------------------------------------
```php
public function index()
{
    $devs = Developer::all();

    return View::make('developers.index', ["devs" => $devs]);
}
```
