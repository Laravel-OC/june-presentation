The Laravel way (cont'd)
------------------------
```php
<?php include __DIR__ . "/../master.php";
// include the master template

// start a new section called "content"
Section::startSection("content"); ?>

Nothing magic here! Everything gets rendered in
the master template above. You get access to all
the things you'd normally have access to. See?

The year is: <?= date("Y") ?>

<?php // and just stop the section when you're done
Section::stopSection("content");
```
