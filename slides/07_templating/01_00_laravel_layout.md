The Laravel way
---------------
```php
<html lang='en'><!-- app/views/master.php -->
<head>
    <title><?= Section::yield("title") ?></title>
</head>
<body>
    <div class="container">
        <?= Section::yield("content") ?>
    </div>
    <?php if ($projects): ?>
        <?= Section::yield("js") ?>
    <?php endif; ?>
</body>
</html>
```
