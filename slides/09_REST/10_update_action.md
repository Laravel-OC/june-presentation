Update the specified resource in storage
----------------------------------------
```php
public function update($id)
{
    $dev = Developer::findOrFail($id);

    $dev->fill(Input::all());

    $dev->save();

    return Redirect::route('developers.show', ['id' => $id]);
}
```
