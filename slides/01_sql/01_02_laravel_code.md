The Laravel way (cont'd)
------------------------
```php
// grabbing the first 10 teenage users
// organized by age (old -> young)
$teenagers = User::whereBetween("age", [13, 19])
    ->orderBy("age", "desc")
    ->take(10)
    ->get();
```
