SQL joins: Laravel Way
-----------------------------------
```php
DB::table('developers')
    ->select('developers.first_name', 'projects.project_name')
    ->join('projects', 'developers.id', '=', 'projects.developer_id')
    ->where('projects.due_date', '<', '2015-01-01 00:00:00')
    ->orderBy('projects.due_date', 'ASC')
    ->get();
```
