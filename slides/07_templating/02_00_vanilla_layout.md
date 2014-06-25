The vanilla PHP way
-------------------
```php
<html lang='en'><!-- app/views/master.php -->
<head>
    <title><?php echo $title; ?></title>
</head>
<body>
    <div class="container">
        <?php echo $content; ?>
    </div>
    <?php if ($projects):
        <?php echo $js; ?>
    endif; ?>
</body>
</html>
```
