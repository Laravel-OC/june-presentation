Getting started
---------------
- Setup your default database connection just like before
- Install migration table to keep track of migrations
  - Use `./artisan migrate:install`
- Create a migration for a project table
  - Use `./artisan migrate:make create_projects_table`
  - Generates all migrations in `app/database/migrations`
- Organized by timestamp and migration action
  - e.g. `2014_06_23_073419_create_developers_table.php`
