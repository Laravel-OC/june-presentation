june-presentation
=================
>One of our presentations, June Edition™

Getting started
---------------
```bash
composer install  # to install dependencies
make develop      # to concat assets and start the server
```

How this works
--------------
Once the PHP server is running you can visit [localhost:8000][localhost] and the
current presentation should show up. Internally here's how that page gets
rendered:

1. The request goes to `showSlides` method on the `SlideController` (in the
   `src` directory)

2. The `SlideController` gets a glob of all `.md` or `.html` files within the
   `/slides` directory. So `/slides/topic/foo.md` is included but
   `/slides/bar.md` is not

3. If the slide is an HTML file, it just gets the contents of it. If the slide
   is Markdown (.md) file it renders it through Parsedown first

4. The slides each get rendered inside an article tag with a class of `.slide`

5. [`deck.js`][deckjs] takes those slides and, with the help of some included
   CSS and other JS (a lot of other JS, actually) turns them into a presentation

[localhost]: http://localhost:8000
[deckjs]: http://imakewebthings.com/deck.js/

Tips
----
### Nested slides

That cool gradually rendering trick for lists or whatever is accomplished via
nested slides. Simply create a `.html` file and do something like this:

```html
<h2>Tagline</h2>
<ul>
    <li class="slide"><h4>First list item</h4></li>
    <li class="slide"><h4>Second list item</h4></li>
    <li class="slide"><h4>The h4s are optional</h4></li>
</ul>
```

The important part here is not the `ul`, but the `.slide` class.

### Ordering

PHP's glob function kind of orders the slides. For now the easiest way to handle
this is just to prefix each of your files with a number (e.g. `00_intro.md`) and
control the order that way. I'm hesitant to add anything more complex like an
index file or a manifest, but if anyone thinks it's important I'll consider it.

### Assets

Assets are concatenated by a *superior* ghetto script, `build.php`, in the root
folder.

Possible topic ideas
--------------------
- [x] Constructing a SQL query w/ joins => *tested*

To join is literally join two table selections together for one query Such a
selection could lead to redundancy as every permutation is given.  However,
joining tables based on a condition allows us to specify a complex selection

```sql
SELECT
    first_name,
    last_name,
    project_name,
    due_date
FROM developers
INNER JOIN projects
    ON developers.id = developer_id
WHERE due_date < '2015-01-01 00:00:00'
ORDER BY due_date ASC;
```

In addition to the already available syntactic sugar, the advantage to the
Database Query Builder is that it returns an array collection of objects.
Objects that are readily available to use in your application. It persisted the
database through a gateway and rendered the object from a factory.
```php
DB::table('developers')
    ->select('developers.first_name', 'developers.last_name', 'projects.project_name', 'projects.due_date')
    ->join('projects', 'developers.id', '=', 'projects.developer_id')
    ->where('projects.due_date', '<', '2015-01-01 00:00:00')
    ->orderBy('projects.due_date', 'ASC')
    ->get();
```

- [x] Comparing two dates => *tested*

```php
// regular PHP
$then = new DateTime("July 4th, 2014");
$now  = new DateTime();

$diff = $then->diff($now, true);

echo $diff->format("%y years, %m months, %d days");
```

```php
// laravel
echo Carbon::now()->diffForHumans(Carbon::parse("July 4th, 2014"));
```

- [x] Doing template inheritance (i.e. not repeating `<!DOCTYPE>`, `<head>`, etc.)

Master pages are best used when we want to avoid repetitions in our code. We can
create a simple default master by creating a layouts folder with a default or
master item. As your project grows larger, obviously we would want to separate
other master files. In a sense, they are a default template that can be
inherited by other sections of content that can then be extended.

```html
<!-- app/views/partials/master.blade.php -->
<html lang='en'>
<head>
    <meta charset='UTF-8' />
    <title>Laravel Developers</title>
</head>
<body>
    <div class='container col-md-6 col-md-offset-3'>
        @yield('content')
    </div>
    @if ($projects)
        @yield('js')
    @endif
</body>
</html>
```

```php
@extends('partials.master')

@section('content')
    <h1>Projects due for {{ date('Y') }}</h1>
    @if(isset($projects))
        @foreach($projects as $project)
            <h3>Project: {{$project->project_name}}</h3>
            <p>Due Date: {{$project->due_date}}</p>
        @endforeach
    @else
        <p>All finished!</p>
    @endif
@stop
```

- [x] Loading files and classes automatically

- [x] "Pretty" urls (without `.php`, GET params w/out `?`, etc.)

- [x] Simple routing

- [x] Database migrations (reversable)

Migrations allow us to version control our database. This entails a full
creation and rollback for every single database event. To handle migrations we
first call: `php artisan migrate:install`. This will create a migration table to
keep track of all migrations used. Every migration file that is made will
contain a version number associated with a time stamp.

To create a migration file in our database, we call: `php artisan migrate:make
create_developers_table`. Note how the command describes the action that our
database will handle. Inside our CreateProjectsTable object, we have two
methods: up and down. The up function is responsible for migrating columns to a
designated table. Down is what action to take when we rollback.  call `php
artisan migrate:rollback`.

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjectsTable extends Migration {

    public function up()
    {
        Schema::create('projects', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('project_name')->unique;
            $table->string('developer_id');
            $table->dateTime('due_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('projects');
    }

}
```
- [ ] Functional testing (simulating HTTP requests)

- [x] Simple CRUD for simple models using REST
  - [x] Blade Forms
  - [x] Redirecting to routes

REST is simply cleaning your URI request into elements that are organized and
easy to understand. REST allows you to create, read, update, and delete
data. Sound familiar? Yes, CRUD. CRUD is used within REST to persist the
database in response to a transaction. The main difference is a RESTful design
allows us to keep our requests and responses organized. To take advantage of
REST we will register a resource within our `app/routes.php`. By taking
advantage of an HTTP Transport Layer, that is a controller, we can persist the
database in a RESTful manner.
```php
// @param URI request group, controller
// Why resource and not controller, we want to explicitly define our REST
// methods with no assumptions. Combats an implicit design from Code Igniter
Route::resource('developers', 'DevelopersController');
```
The following resource will register a proper route for a URI request. This
includes indexing, creating, storing, showing, editing, updating, putting, and
destroying. These are HTTP verbs that handle our CRUD functionality. Artisan
allows you to see these associations via `php artisan routes`:

| URI                                   | Name               | Action                       |
| ------------------------------------- | ------------------ | ---------------------------- |
| GET\HEAD developers                   | developers.index   | DevelopersController@index   |
| GET\HEAD developers/create            | developers.create  | DevelopersController@create  |
| POST developers                       | developers.store   | DevelopersController@store   |
| GET\HEAD developers/{developers}      | developers.show    | DevelopersController@show    |
| GET\HEAD developers/{developers}/edit | developers.edit    | DevelopersController@edit    |
| PUT developers/{developers}           | developers.update  | DevelopersController@update  |
| PATCH developers/{developers}         | developers.update  | DevelopersController@update  |
| DELETE developers/{developers}        | developers.destroy | DevelopersController@destroy |

Many developers get mixed up with PUT and PATCH. PUT is updating an entire entry
whereas PATCH is replacing a section of data --not the whole thing.

Our first controller method, index, is primarily concern with querying
the database and returning an object collection of developers. Thanks to the
Eloquent ORM, we can do so with ease. Notice that we send through the view an
array containing the object collection. Our view can then process this data and
display it via Blade templating.
```php
<?php

class DevelopersController extends \BaseController {

/**
 * Display a listing of the developers
 * GET /developers
 *
 * @return Response
 */
public function index()
{
	$developers = Developer::all();
	return View::make('developers.index', compact('developers'));
}
```

Our second controller method will return a form that will allow us to create a
new developer
```php
/**
 * Show the form for creating a new developer.
 * GET /developers/create
 *
 * @return Response
 */
public function create()
{
	return View::make('developers.create');
}
```

Our third controller method will create a new instance of the Developer model.
This model has access to Eloquent properties. We will assign the main
attributes of a Developer model from the Input facade. With Input, we can
explicitly define the assignment of properties. We save the instance to which
then stores the value as a new entity in the database. We clean our headers and
redirect back to our developers index page.

```php
/**
 * Store a newly created developer in storage
 * POST /developers
 *
 * @return Response
 */
public function store()
{
	$developer = new Developer;
	$developer->first_name = Input::only("first_name");
	$developer->last_name = Input::only("last_name");
	$developer->save();

	return Redirect::route('developers.index');
}
```

Alternatively, you may want to take advantage of Mass Assignment.
The advantage of mass assignment is the ability to easily bind data to an
entity --no matter the scale of inputs.
```php
Developer::create(Input::all());
```

Be sure to create a blacklist or whitelist in your models to defend against Mass
Assignment Vulnerability.
```php
<?php

class Developer extends Eloquent {
	protected $fillable = ['first_name', 'last_name'];
}
```

Our fourth controller method will grab an identifier from our URI and use it as
a parameter to find a developer and then return that specific developer to a
view.
```php
/**
 * Display the specified developer.
 * GET /developers/{id}
 *
 * @param  int  $id
 * @return Response
 */
public function show($id)
{
	$developer = Developer::findOrFail($id);
	return View::make('developers.show', compact('developer');
}
```

Our fifth controller method will grab an identifier from our URI and specific
action. In this example, we want to edit a developer with a certain identity.
REST allows a clean and explicit URI. We find the developer base on that
identity and display a view with a form to edit out entity.
```php
/**
 * Show the form for editing the developer resource.
 * GET /developers/{id}/edit
 *
 * @param  int  $id
 * @return Response
 */
public function edit($id)
{
	$developer = Developer::findOrFail($id);
	return View::make('developers.edit', compact('developer');
}
```

We can use form-model binding to bind a model's current instance
variables to a form. That is, list the current values of a model in input tag
values.
```php
@section('content')
	{{ Form::model($developer, ['method' => 'PATCH', 'route' =>
	['developers.update', $developer->id]]) }}
		<div>
			{{ Form::label('first_name', 'First Name:') }}
			{{ Form::text('first_name') }}
		</div>
		<div>
			{{ Form::label('last_name', 'Last Name:') }}
			{{ Form::text('last_name') }}
		</div>
		<div>
			{{ Form::submit('Update Developer') }}
		</div>
@stop
```

Our sixth controller method takes advantage of spoofing a PATCH action. That is
updating a section of data. Once we edit our form, we can then update our
current developer object by grabbing a current model from persistence, fill-in
the new attributes, and save them. Notice we redirect back using that original
identifier, we can now view our changes immediately
```php
/**
 * Update the specified resource in storage.
 * PATCH /developers/{id}
 *
 * @param  int  $id
 * @return Response
 */
public function update($id)
{
	$developer = Developer::findOrFail($id);
	$developer->fill(Input::all());
	$developer->save();

		return Redirect::route('developers.show', ['id' => $id]);
	}
```
Our seventh, and final controller, will remove a developer from storage. We
first find the user base on their identity. Then we delete the entity from
persistence. That simple. We redirect back to the developers index to see
our current list of developers.
```php
/**
 * Remove the specified resource from storage.
 * DELETE /developers/{id}
 *
 * @param  int  $id
 * @return Response
 */
public function destroy($id)
{
	$developer = Developer::findOrFail($id);
	$developer->delete();

	return Redirect::route('developers.index');
	}
```

- [ ] JSON responses (headers too)

- [x] Redirecting

A redirect is a special type of response object which redirects the flow of the
application to another route. With Laravel, redirecting couldn't be easier. We
have the option to redirect using a route resource, a named route, or even
a controller action:

```php
// Redirect to a route
return Redirect::to('developer/login');

// Redirect to a named route
return Redirect::to('login');

// Redirect to a Controller action
return Redirect::action('DevelopersController@index');
```

The ability to redirect comes with the ease of use that Laravel offers
internally. Behind the scenes, Laravel will handle your redirect in addition to
keeping your headers clean. Think *F5* on a POST. In addition to this, you can
easily pass through session data through flash:
```php
return Redirect::to('developer/login')->with('message', 'Login Failed');
```

- [x] CSRF tokens

- [x] Authentication (password hashing, encryption)

Authentication is absolutely essential in any application that requires private,
but moderated, user interaction. The most well known application of
authentication is login a user for an interactive session.

Laravel's Authentication facade allows for easy authentication and session
creation. However, before we go through the process of authenticating a user, we
need an entity with a password that has been hashed. Password hashing is
essential in keeping your database credentials secure and difficult to
compromise. Let's use our database seeder to demonstrate how easy it is to hash
a password:
```php
<?php

use \Developer;

class DeveloperTableSeeder extends Seeder {

	public function run()
	{
		Developer::truncate();

		Developer::create([
			'email'		 => 'ciaran@ciarandowney.com',
			'username'	 => 'ciarand',
			'password'   => Hash::make('1234'),
		]);
	}
}

// Alternatively, if you were creating an account via form:
Developer::create([
	'username'   => Input::only('username'),
	'email'      => Input::only('email'),
	'password'   => Hash::make(Input::only('password')),
]);
```
| password                                                       |
| -------------------------------------------------------------- |
| '$2y$10$pTfWG6LZoSU4P86Ksw3SMuabv.g92Z75RMa8cO98llVYr8AZvZJ12' |

Notice how easy it is to generate a random key, hash it, salt it, and much more,
for a proper encryption. Now that we generated a developer account with a hashed
passoword, let's authenticate it for a application session.

Wihin our route, we will register a login and logout route that will use our
Session Controller to automate a user's life-cycle. We register a resource to
combat any other requests in our URI that may be made. Remember, it always good
to be explicit versus allowing implicit request. We also include a developer
admin section to simulate a moderated view.

```php
Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');

Route::resource('sessions', 'SessionsController');

Route::get('projects', function()
{
	return 'List of Super Secret Projects';
})->before('auth');
```
Notice we apply a before filter. This filter will check to see if a user is a
guest. By default, a user who has not logged-in, is a guest. We then redirect
the user to a login route. Else, we can safely come to the deduction that the
user is a developer and therefore can see the projects view.

```php
Route::filter('auth', function()
{
    if (Auth::guest())
    {
		return Redirect::guest('login');
    }
});
```

Within our Session Controller, we will be primarily concern with login and
logout. Our create method will check to see if a user is authenticated, if they
are, then they can be redirected to the projects view. Else, we will return a
developer login view.

```php
public function create()
{
	if (Auth::check()) return Redirect::to('/projects');
	return View::make('developers.login');
}
```

Once we submit our form for login, our store method will attempt to login the
user base on their credentials provided. Notice we explicitly define which
inputs to use. We then return a greeting to the developer to simulate a
successful login. If the attempt failed, we can redirect back with the input and
a flash message.

```php
public function store()
{
	if (Auth::attempt(Input::only('email', 'password'))) {
		return "Get to work, " . Auth::user()->username . "!";
	}
	return Redirect::back()->with('message', 'Invalid
	credentials')->withInput();
}
```

Finally, to logout a user, we use the destroy method to destroy the current login
session.

```php
public function destroy()
{
	Auth::logout();
	return Redirect::home()->with('message', 'Logged out');
}
```

With a few basic methods, the Auth facade offers an easy and natural way to
authenticate user. No longer do you have to concern yourself with writing an
authentication module for your users. Like many things in Laravel, it just works.

- [ ] Deployment process

- [ ] Repeatable environments (Vagrant)

- [ ] Debug mode

- [ ] i8n

- [ ] Logging

- [ ] Email

- [ ] Queues

- [ ] Making CURL requests

- [ ] Maintenance mode

- [ ] Error handling

- [ ] IoC Container

- [ ] Dependency Injection

- [ ] Laravel Resources and the Community

- [ ] Laravel as your first ever PHP framework


Author Blurbs
-------------
The PHP world has been rocked by an explosion of new frameworks, best practices,
coding guidelines, and more database management tools than you can shake a stick
at. Laravel, especially, seems to be one of the biggest trends in PHP right now.
But what benefit does this new framework actually bring to the table?

Your hosts Ciaran Downey, Justin Page, and Benjamin Walters will be discussing
some of the common problems that you as a developer might experience and how to
solve them both within a framework like Laravel and in vanilla PHP.

Ciaran Downey has been developing in PHP for over 3 years, and he's only had 2
brain aneurysms in that whole time. He occasionally blogs at ciarand.me and
frequently codes at github.com/ciarand.

Justin Page (@KLVTZ on both Twitter and GitHub) is a passionate student of PHP,
always willing to learn and share that knowledge with others. He's currently
earning his Computer Science degree at UCI.

Benjamin Walters is an PHP wizard, trained in the dark arts of regex, master of
the soul crushing monotony that is C++, and too engrossed in learning the
secrets of the universe and PHP to write his own bio or blog at
blog.benjaminwalters.net.

