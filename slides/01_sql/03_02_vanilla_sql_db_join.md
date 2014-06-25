SQL joins: Vanilla Way
-----------------------------------
```php
SELECT
    first_name,
    project_name,
FROM developers
INNER JOIN projects
    ON developers.id = developer_id
WHERE due_date < '2015-01-01 00:00:00'
ORDER BY due_date ASC;
```
