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

