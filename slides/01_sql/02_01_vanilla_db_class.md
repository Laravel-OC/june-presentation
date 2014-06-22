The vanilla PHP way
-------------------
```php
    public function fetchByQuery($query)
    {
        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt->fetch();
    }
}
```
