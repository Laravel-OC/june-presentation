The vanilla PHP way (cont'd)
----------------------------
```php
class UserRepo extends BaseRepo {

    public function findByPk($key) {
        $safe_key = intval($key);

        return $this->fetchByQuery(
            "SELECT * FROM users
              WHERE id = {$safe_key}"
        );
    }
```
