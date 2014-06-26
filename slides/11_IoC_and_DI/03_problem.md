Problem
-------
```php
class DevelopersController extends BaseController
{
    public function index()
    {
        $devs = Developer::all();

        return View::make('developers.index', ["devs" => $devs]);
    }
}
```
- Concise, but unable to test without hitting the database.
- Eloquent ORM is tightly couple to our controller.
- Violates single responsibility.
- Think of a monitor and cable line.
