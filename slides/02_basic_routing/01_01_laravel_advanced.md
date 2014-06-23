The Laravel way (cont'd)
------------------------
```php
// different request methods

Route::get("/blog/post/{id}", function ($id) {
    // show that post
});

Route::delete("/blog/post/{id}", function ($id) {
    // delete that post
});
```
