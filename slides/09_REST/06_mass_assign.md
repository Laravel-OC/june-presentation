You may want to take advantage of mass assignment
-------------------------------------------------
```php
public function store()
{
    Developer::create(Input::all());

    return redirect::route('developers.index');
}
```

Guard against mass assignment vulnerability with a whitelist

```php
class Developer extends Eloquent
{
    protected $fillable = ['first_name', 'last_name'];
}
```

##### Make you still do input validation!
