Binding our Dependencies
------------------------
```php
App::bind('OC\Repositories\DeveloperRepositoryInterface',
	'OC\Repositories\DBDeveloperRepository');

// Sometimes you may wish to resolve only one instance of a given class
// throughout your entire application.

App::singleton('OC\Repositories\DeveloperRepositoryInterface',
'OC\Repositories\DBDeveloperRepository');

// Or you may wish to pass through an already existing instance
App::singleton('OC\Repositories\DeveloperRepositoryInterface', $developer);
```

