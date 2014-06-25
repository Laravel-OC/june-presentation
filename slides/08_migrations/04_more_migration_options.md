More options
------------
- Rollback the last migration
  - Using `./artisan migrate:migrate`
- Reset the entire database by rolling everything back
  - `./artisan migrate:reset`
- Add a `due_date` column to a projects table:
  ```bash
  ./artisan migrate:make \
        `# the name of the migration` \
        add_due_dates_to_projects_table \
        `# the table to generate a migration for` \
        --table=projects
  ```
