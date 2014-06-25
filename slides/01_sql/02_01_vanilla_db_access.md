The vanilla PHP way
-------------------
```php
$query = <<<QUERY
    SELECT *
    FROM developers
    WHERE due_date < ":due_date"
    AND WHERE completed_at IS NULL
    ORDER BY due_date ASC;
QUERY;

$conn->prepare($query)->execute(
    [":due_date" => "2015-01-01 00:00:00"]
);

do_something_with($prep->errorInfo());
```
