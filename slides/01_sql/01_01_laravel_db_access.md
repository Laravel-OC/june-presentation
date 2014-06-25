The Laravel way
---------------
```php
$query = DB::table("developers")
    ->select("*")
    ->where("projects.due_date", "<", ":due_date")
    ->whereNull("completed_at")
    ->orderBy("projects.due_date", "ASC");

// bind any params
$query->setBindings(
    [":due_date" => "2015-01-01 00:00:00"]
);

$query->get();
```
