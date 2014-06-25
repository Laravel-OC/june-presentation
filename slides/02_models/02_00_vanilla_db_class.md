The vanilla PHP way
-------------------
```php
class BaseRepo
{
    private $conn;

    public function __construct(PDO $conn) {
        $this->conn = $conn;
    }

    // continued
```
