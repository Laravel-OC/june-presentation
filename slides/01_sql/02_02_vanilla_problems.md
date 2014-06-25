Problems with the vanilla way
-----------------------------
- Hard to pass around the PDO connection
- Hard to mock the PDO connection in tests
- Hard to switch database systems
- Did anyone notice the SQL issue?

  ```sql
  -- double quotes are MySQL specific
  WHERE due_date < ":due_date"
  ```

- Hard to change DB table prefixes
- Remember to check `errorInfo` every time
