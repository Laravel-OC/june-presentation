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

Assets are concatenated by a super ghetto script, `build.php`, in the root
folder.

Possible topic ideas
--------------------
- [x] Constructing a SQL query w/ joins
To join is lterally join two table selections together for one query
Such a selection could lead to redundancy as every permutation is given.
However, joining tables based on a condition allows us to specify a complex selection
```sql
SELECT first_name, last_name, project_name FROM developers INNER JOIN projects ON developers.id = developer_id WHERE due_date < 24 ORDER BY due_date;   
```

```php
DV::table('developers')
	->join('projects', function($join) 
	{
		$join->on('projects', 'developers.id', '=' 'projects.developer_id)
			->where('projects.due_date', '<', 24)
			->select('developers.first_name', 'developers.last_name', 'projects.project_name')
	})->get();
```

- [x] Comparing two dates

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

- [ ] Doing template inheritance (i.e. not repeating `<!DOCTYPE>`, `<head>`, etc.)

- [ ] Simple routing

- [ ] Loading files and classes automatically

- [ ] "Pretty" urls (without `.php`, GET params w/out `?`, etc.)

- [ ] Database migrations (reversable)

- [ ] Functional testing (simulating HTTP requests)

- [ ] Simple CRUD for simple models

- [ ] JSON responses (headers too)

- [ ] Redirecting

- [ ] CSRF tokens

- [ ] Authentication (password hashing, encryption)

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
