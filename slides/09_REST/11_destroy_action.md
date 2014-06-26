Remove specified resource from storage
--------------------------------------
```php
public function destroy($id)
{
    // grab the model first
    Developer::findOrFail($id)->delete();
    // OR
    $affectedRows = Developer::destroy($id);

    return Redirect::route('developers.index');
}
```
