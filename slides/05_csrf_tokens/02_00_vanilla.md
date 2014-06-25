The vanilla PHP way
-------------------
```php
// generates the csrf token
function csrf_token()
{
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }

    $_SESSION["token"] =
        md5(uniqid(mt_rand(), true)));

    return ($_SESSION["_token"]);
}
```
