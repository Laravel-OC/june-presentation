```php
public function processLogin()
{
    if (Auth::attempt(Input::only('email', 'password'))) {
        return Redirect::to('/projects')
            ->with('message', 'Successfully logged in');
    }

    return Redirect::back()
        ->with('message', 'Invalid credentials')
        ->withInput();
}
```
