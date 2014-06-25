The Laravel way (cont'd)
------------------------
```php
<?php include __DIR__ . "/../master.php"; ?>

<!-- start a new section, content -->
<?php Section::startSection("content"); ?>

    regular php content goes here<br>

    this will be rendered in the "master" template

    the year is <code><?= date("Y") ?></code>

<?php Section::stopSection("content"); ?>
```
