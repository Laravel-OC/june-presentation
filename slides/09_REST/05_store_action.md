Store a newly created developer in storage
------------------------------------------
```php
public function store()
{
    $dev = new developer;

    $dev->first_name = input::only("first_name");
    $dev->last_name  = input::only("last_name");

    $dev->save();

    return redirect::route('developers.index');
}
```

