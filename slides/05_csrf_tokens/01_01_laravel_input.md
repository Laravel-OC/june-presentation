The Laravel way (cont'd)
------------------------
```php
Route::post('register', [
    // filters to apply
    'before' => 'csrf',
    function() {
        return 'You gave a valid CSRF token!';
    }
]);

// Or
Route::post('register',
    ["before" => "csrf", "Controller@register"]
);
```
