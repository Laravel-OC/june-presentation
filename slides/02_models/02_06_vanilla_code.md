The vanilla PHP way (cont'd)
----------------------------
```php
$user = [
    "first_name" => "Justin",
    "last_name"  => "Page",
    "profession" => "Developer",
];

$query = <<<QUERY
    INSERT INTO users
        (first_name, last_name, profession)
    VALUES
        (':first', ':last', ':profession')
QUERY;
```
