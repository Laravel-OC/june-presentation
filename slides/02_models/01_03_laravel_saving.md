The Laravel way (cont'd)
------------------------
```php
$user = new User();

$user->first_name = "Ciaran";
$user->last_name  = "Downey";
$user->profession = "Developer";

try {
    $primary_key = $user->save()
} catch (Exception $e) {
    Log::error($e->getMessage());

    throw $e;
}
```
