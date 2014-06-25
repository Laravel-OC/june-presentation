The vanilla PHP way
-------------------
```php
<html lang='en'><!-- app/views/master.php -->
<head>
    <title><?= $title ?></title>
</head>
<body>
    <div class="container">
        <?= $content ?>
    </div>
    <?php if ($projects): ?>
        <?= $js ?>
    <?php endif; ?>
</body>
</html>
```
