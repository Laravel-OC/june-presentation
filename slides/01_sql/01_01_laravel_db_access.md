The Laravel way
---------------
```php
$query = DB::table("developers")
    ->select("*")
    ->where("developers.age", ">", 30)
    ->whereNull("retired_at")
    ->orderBy("salary", "DESC")
    ->get();
```
