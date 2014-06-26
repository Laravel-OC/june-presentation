Binding our Dependencies
------------------------
```php
App::bind( // bind this interface
    'DeveloperRepositoryInterface',
    'DBDeveloperRepository' // to this implementation
);

// Sometimes you may wish to resolve only one instance of a given
// class throughout your entire application.
App::singleton( // bind this interface
    'DeveloperRepositoryInterface',
    'DBDeveloperRepository' // to the same object
);

// Or you may wish to pass through an already existing instance
App::singleton('DeveloperRepositoryInterface', $repo);
```

