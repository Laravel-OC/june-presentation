Display a listing of the developers
-----------------------------------
```php
class DevelopersController extends \BaseController {

    public function index()
    {
        $devs = Developer::all();

        return View::make('developers.index', ["devs" => $devs]);
    }
```
