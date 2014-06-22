The Laravel way (cont'd)
------------------------
```php
<?php

// grabbing all the users:
$all_users = User::all();

// grabbing the user with pk = 3
$user_no_3 = User::find(3);

// grabbing the first 10 teenage users
// organized by age (old -> young)
$teenagers = User::whereBetween("age", [13, 19])
    ->orderBy("age", "desc")
    ->take(10)
    ->get();
```
