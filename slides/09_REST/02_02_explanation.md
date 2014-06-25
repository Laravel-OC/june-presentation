```php
class DevelopersController
{
    // show an index page for this resource
    public function index();
    // show a create form for this resource
    public function create();
    // store a resource
    public function store();
    // show the requested resource
    public function show($id);
    // show an edit form for the requested resource
    public function edit($id);
    // update the requested resource
    public function update($id);
    // delete the requested resource
    public function destroy($id);
}
```
