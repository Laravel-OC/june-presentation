The vanilla PHP way (cont'd)
----------------------------
```php
// grabbing the first 10 teenage users
// organized by age (old -> young)
$teenagers = $repo->fetchByQuery(
  "SELECT * FROM users
    WHERE age BETWEEN 13 AND 19
    ORDER BY age DESC LIMIT 10"
);
```
