Remove specified resource from storage
--------------------------------------
```php
public function destroy($id)
{
    $dev = Developer::findOrFail($id);

    $dev->delete();

    return Redirect::route('developers.index');
}
```
