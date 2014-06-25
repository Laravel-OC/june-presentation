Show form for creating a new developer
--------------------------------------
```php
class DevelopersController extends \BaseController {
    public function index()
    {
        $devs = Developer::all();

        return View::make('developers.index', ["devs" => $devs]);
    }
```
