Dependency Injection
-------------------
```php
class DevelopersController extends BaseController
{
    protected $repo;

    public function __construct(DeveloperRepositoryInterface $repo)
    {
        $this->developers = $repo;
    }

    public function index()
    {
        $devs = $this->repo->all();

        return View::make('developers.index', ["devs" => $devs]);
    }
}
```
