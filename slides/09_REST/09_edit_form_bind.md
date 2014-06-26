Use form-model binding
----------------------
```php
<?= Form::model($dev,
    ["method" => "PATCH", "route" => "developers.update", $dev->id]
) ?>
    <div>
        <?= Form::label('first_name', 'First Name:') ?>
        <?= Form::text('first_name') ?>
    </div>
    <div>
        <?= Form::label('last_name', 'Last Name:') ?>
        <?= Form::text('last_name') ?>
    </div>
    <div><?= Form::submit('Update Developer') ?></div>
<?= Form::close() ?>
```
