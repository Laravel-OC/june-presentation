Different ways to redirect
--------------------------
```php
// Redirect to a route
return Redirect::to('developer/login');

// Redirect to a named route
return Redirect::to('login');

// Redirect to a Controller action
return Redirect::action('DevelopersController@index');
```
