The vanilla PHP way
-------------------
```php
$dsn = "{$dbtype}:dbname={$dbname};host={$host}";

$conn = new PDO($dsn, $dbuser, $dbpass);

//TODO: set charset, collation, table prefixes
```
