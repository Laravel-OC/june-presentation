The vanilla PHP way (cont'd)
----------------------------
```php
    // continued
    public function findAll()
    {
        return $this->fetchByQuery(
            "SELECT * FROM users"
        );
    }
}
```
