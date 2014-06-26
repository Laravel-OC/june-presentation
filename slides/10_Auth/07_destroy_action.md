Logout the user
---------------
```php
public function logout()
{
    Auth::logout();

    return Redirect::home()->with('message', 'Logged out');
}
```
