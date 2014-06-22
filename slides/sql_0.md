```php
<?php // laravel

class User extends Eloquent
{
    // don't need to add anything here
}

// grabbing all the users:
$all_users = User::all();

// grabbing the user with pk = 3
$user_three = User::find(3);

// grabbing the first 10 teenage users organized by age (oldest to youngest)
$teenagers = User::whereBetween("age", [13, 19])->orderBy("age", "desc")->take(10)->get();
```

```php
<?php // vanilla php

class UserRepo
{
    private $conn;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }

    public function findByPk($key)
    {
        $safe_key = intval($key);

        // global database access
        return $this->fetchByQuery(
            "SELECT * FROM user WHERE id = {$safe_key}"
        );
    }

    public function findAll()
    {
        return $this->fetchByQuery(
            "SELECT * FROM user"
        );
    }

    public function fetchByQuery($query)
    {
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        //TODO: error checking
        //TODO: fetch style
        //TODO: normalize results (ints, strings, datetimes, etc.)
        return $stmt->fetch();
    }
}

// now we have to instantiate the repo
$repo = new UserRepo($db_from_somewhere);

// grab all the users
$all_users = $repo->findAll();

// grabbing the user with pk = 3
$user_three = $repo->findByPk(3);

// grabbing the first 10 teenage users organized by age (oldest to youngest)
//TODO: make this part modular
//TODO: allow changing order by
//TODO: allow changing limit
//TODO: prevent SQL injection
$teenagers = $repo->fetchByQuery(
    "SELECT * FROM user WHERE age BETWEEN 13 AND 19 ORDER BY age DESC LIMIT 10"
);

```
