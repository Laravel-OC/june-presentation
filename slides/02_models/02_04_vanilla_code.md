The vanilla PHP way (cont'd)
----------------------------
```php
$repo = new UserRepo($db_from_somewhere);

// grab all the users
$all_users = $repo->findAll();

// grabbing the user with pk = 3
$user_no_3 = $repo->findByPk(3);
```
