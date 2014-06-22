The vanilla PHP way
-------------------
```php
class BaseRepo
{
    private $conn;

    public function __construct(PDO $conn) {
        $this->conn = $conn;
    }

    //TODO: error checking
    //TODO: fetch style
    //TODO: cast results to appropriate data types
    public function fetchByQuery($query)
    {
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch();
    }
}
```
