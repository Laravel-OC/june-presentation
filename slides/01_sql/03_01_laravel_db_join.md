The Laravel way
---------------
```php
DB::table('developers')
    // select these columns
    ->select('developers.first_name', 'projects.project_name')
    // LEFT JOIN projects ON developers.id = projects.developer_id
    ->join('projects', 'developers.id', '=', 'projects.developer_id')
    // add any number of conditions
    ->where('projects.due_date', '<', $due_date)
    ->whereNull('projects.completed_at')
    // arbritrary clauses
    ->orderBy('projects.due_date', 'ASC')
    // limit by X
    ->take($limit)
    // perform the query
    ->get();
```
