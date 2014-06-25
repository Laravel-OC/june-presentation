Problem
-------
```php
class DevelopersController extends \BaseController {

public function index()
{
	$developers = Developer::all();
	return View::make('developers.index', compact('developers'));
}
```
- Concise, but unable to test without hitting the database.
- Eloquent ORM is tightly couple to our controller.
- violates single responsibility.
- Think of a monitor and cable line.
