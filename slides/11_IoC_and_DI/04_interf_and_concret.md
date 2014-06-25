Inversion of Control Container
-----------------------------
```php
interface DeveloperRepositoryInterface
{
	public function all();
}

class DBDeveloperRepository implements DeveloperRepositoryInterface
{
	protected function all()
	{
		return Developer::all();
	}
}
```
