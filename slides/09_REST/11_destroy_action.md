Remove specified resource from storage
--------------------------------------
```php
public function destroy($id)
{
	$developer = Developer::findOrFail($id);
	$developer->delete();

	return Redirect::route('developers.index');
	}
```
