The Composer way (cont'd)
-------------------------
```php
// as long as the autoload file has been included
// before, we don't have to specify anything else

$cat = new MyNamespace\Model\Cat();

// loaded only when used = lazy loading
$hat = new MyNamespace\Fashion\Hat();

$cat->moveInside($hat);
```
