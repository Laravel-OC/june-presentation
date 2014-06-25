Update the specified resource in storage
---------------------------------------
```php
public function update($id)
{
	$developer = Developer::findOrFail($id);
	$developer->fill(Input::all());
	$developer->save();

		return Redirect::route('developers.show', ['id' => $id]);
	}
```
