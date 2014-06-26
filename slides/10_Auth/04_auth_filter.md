Authentication Filter
--------------------
```php
Route::filter('auth', function() {
    if (Auth::guest()) {
        // sneaky sneaky
        return Redirect::guest('login');
    }
});
```
