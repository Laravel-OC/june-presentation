Store a newly created developer in storage
------------------------------------------
```php
public function store()
{
    $dev = new Developer;

    $dev->first_name = Input::only("first_name");
    $dev->last_name  = Input::only("last_name");

    $dev->save();

    return Redirect::route('developers.index');
}
```

