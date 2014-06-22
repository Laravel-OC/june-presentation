The vanilla PHP way (cont'd)
----------------------------
```php
$repo = new UserRepo($db_from_somewhere);

// grab all the users
$all_users = $repo->findAll();

// grabbing the user with pk = 3
$user_no_3 = $repo->findByPk(3);

// grabbing the first 10 teenage users organized by age
$teenagers = $repo->fetchByQuery(
    "SELECT * FROM user
        WHERE age BETWEEN 13 AND 19
        ORDER BY age DESC LIMIT 10"
);
```
