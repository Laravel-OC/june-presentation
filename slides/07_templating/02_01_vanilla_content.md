The vanilla PHP way (cont'd)
----------------------------
```php
<?php /* start output buffering */ ob_start(); ?>
Nothing magic here! Everything gets rendered in
the master template above. You get access to all
the things you'd normally have access to. See?

The year is: <?= date("Y") ?>

<?php

$content  = ob_get_clean();
$title    = "My Cool Title";
$projects = [];

include __DIR__ . "/../master.php";
```
