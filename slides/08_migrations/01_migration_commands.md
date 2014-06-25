Getting started
---------------

- Setup your default database connection:
  - *app/config/database.php*
- Install migration table to keep track of migrations:
  - `php artisan migrate:install`
- Create a migration for a project table:
  - `php artisan migrate:make create_projects_table`
  -  Generates all migrations to *app/database/migrations*
- Organized by times stamp and migration action
  - *2014_06_23_073419_create_developers_table.php* 