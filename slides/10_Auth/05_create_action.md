Login a user
------------
```php
public function login()
{
    if (Auth::check()) {
        // if they're already logged in they shouldn't be here
        return Redirect::to('/projects');
    }

    return View::make('developers.login');
}
```

