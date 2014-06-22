The vanilla PHP way (cont'd)
----------------------------
```php
<?php

class UserRepo extends BaseRepo
{
    public function findByPk($key)
    {
        return $this->fetchByQuery(
            "SELECT * FROM user WHERE id = " . intval($key));
    }

    public function findAll()
    {
        return $this->fetchByQuery("SELECT * FROM user");
    }
}
```
