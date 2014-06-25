Display a listing of the developers
-----------------------------------
```php
public function index()
{
    $devs = Developer::all();

    return View::make('developers.index', ["devs" => $devs]);
}
```
