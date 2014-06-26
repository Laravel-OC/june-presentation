What goes up&hellip;
--------------------
```php
public function up()
{
    // create a "projects" table and apply these features
    Schema::create('projects', function(Blueprint $table) {
        // primary key named 'id'
        $table->increments('id');
        // a unique string named 'project_name'
        $table->string('project_name')->unique();
        $table->string('developer_id');

        $table->dateTime('due_date');
        $table->dateTime('completed_at')->nullable();
        // "created_at" and "updated_at" columns
        $table->timestamps();
    });
}
```
