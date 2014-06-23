The Old way
-----------
```php
// ever seen something like this?
require "../inc/libs/_globals/bootstrap_NEW.php";

// or this?
foreach ($required_files as $file) {
    require $file;
}

// or this?
foreach (glob("../lib/*.php") as $file) {
    require $file;
}
```
