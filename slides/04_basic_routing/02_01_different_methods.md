The vanilla PHP way
-------------------
```php
switch (strtoupper($_SERVER["REQUEST_METHOD")) {
    "GET":
        // show the post
        break;
    "DELETE":
        // do delete stuff
        break;
    default:
        // show a 404
}
```
