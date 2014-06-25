Dependency Injection
-------------------
class DevelopersController extends \BaseController {

	protected $developers;

	public function __construct(DeveloperRepositoryInterface $developers)
	{
		$this->developers = $developers;
	}

	public function index()
	{
		$developers = $this->developers->all();
		return View::make('developers.index', compact('developers'));
	}
}

