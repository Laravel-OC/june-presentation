More options
-----------
- Rollback the last migration:
  - `php artisan migrate:migrate`
- Reset the entire database --nothing migrated:
  - `php artisan migrate:reset`
- Add a due date column to a projects table:
  - `php artisan migrate:make add_due_dates_to_projects_table --table=projects`
