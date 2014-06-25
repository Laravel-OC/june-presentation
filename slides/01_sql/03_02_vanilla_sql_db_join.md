The vanilla PHP way
-------------------
```php
$query = <<<QUERY
    SELECT first_name, project_name
    FROM developers
    INNER JOIN projects
        ON developers.id = developer_id
    WHERE due_date < ':due_date'
    ORDER BY due_date ASC
    LIMIT :limit
QUERY;

$conn->prepare($query)->execute(
    [":due_date" => $due_date, ":limit" => $limit]
);

do_something_with_these_errors($prep->errorInfo());
```
