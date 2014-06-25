Different ways to Redirect
--------------------------
- A redirect is a special type of response object which redirects the flow of
  the application to another route

```php
// Redirect to a route
return Redirect::to('developer/login');

// Redirect to a named route
return Redirect::to('login');

// Redirect to a Controller action
return Redirect::action('DevelopersController@index');
```
