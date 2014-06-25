What goes up...
---------------------------
```php
<?php
    public function up()
    {
        Schema::create('projects', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('project_name')->unique;
            $table->string('developer_id');
            $table->dateTime('due_date');
            $table->timestamps();
        });
    }
}
```
