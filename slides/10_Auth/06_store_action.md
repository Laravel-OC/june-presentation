```php
public function store()
{
    if (Auth::attempt(Input::only('email', 'password'))) {
        return "Get to work, " . Auth::user()->username . "!";
    }

    return Redirect::back()
        ->with('message', 'Invalid credentials')
        ->withInput();
}
```
