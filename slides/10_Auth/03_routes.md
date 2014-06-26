Register a Login and Logout
---------------------------
```php
Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');

Route::resource('sessions', 'SessionsController');

// we don't want just anyone to access this
Route::get('projects', function() {
    return 'List of Super Secret Projects';
    // so we run the auth filter before showing it to anyone
})->before('auth');
```
