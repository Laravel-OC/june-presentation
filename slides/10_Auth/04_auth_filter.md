Authentication Filter
--------------------
```php
// the auth filter
Route::filter('auth', function() {
    if (Auth::guest()) {
        // sneaky sneaky
        return Redirect::guest('login');
    }
});
```
