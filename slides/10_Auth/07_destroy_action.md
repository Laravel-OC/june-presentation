Logout the user
---------------
```php
public function destroy()
{
    Auth::logout();

    return Redirect::home()->with('message', 'Logged out');
}
```
