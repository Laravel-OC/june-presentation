The vanilla PHP way (cont'd)
----------------------------
```php
<?php /* start output buffering */ ob_start(); ?>
    regular php content goes here
    <br>
    this will be rendered in the "master" template
    <br>
    the year is <code><?= date("Y") ?></code>
<?php $content = ob_get_clean(); ?>
<?php $title = "My Cool Title"; ?>
<?php $projects = []; ?>

<?php include __DIR__ . "/../master.php"; ?>
