Register a Login and Logout
---------------------------
```php
Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');

Route::resource('sessions', 'SessionsController');

Route::get('projects', function()
{
	return 'List of Super Secret Projects';
})->before('auth');
```
