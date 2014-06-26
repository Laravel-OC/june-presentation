The vanilla PHP way
-------------------
```php
$query = <<<QUERY
    SELECT *
    FROM developers
    WHERE age > :age
    AND WHERE retired_at IS NULL
    ORDER BY salary DESC
QUERY;

$prep = $conn->prepare($query);

$prep->execute([":age" => 30]);

do_something_with_these_errors($prep->errorInfo());
```
