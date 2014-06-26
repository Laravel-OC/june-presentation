Register a Login and Logout
---------------------------
```php
Route::get('login', 'AuthController@login');
Route::post('login', 'AuthController@processLogin');
Route::get('logout', 'AuthController@logout');

// we don't want just anyone to access this
Route::get('projects', function() {
    return 'List of Super Secret Projects';
    // so we run the auth filter before showing it to anyone
})->before('auth');
```
