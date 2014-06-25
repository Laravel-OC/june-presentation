Update the specified resource in storage
----------------------------------------
```php
public function update($id)
{
    $dev = Developer::findOrFail($id);

    $dev->fill(Input::all());

    try {
        $dev->save();
    } catch (Exception $e) {
        Log::error($e);

        Redirect::to("developers.error");
    }

    return Redirect::route('developers.show', ['id' => $id]);
}
```
