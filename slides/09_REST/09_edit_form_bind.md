Use form-model binding
----------------------
- Bind a model's current instance variables to a form
- List the current values of a model in input tags
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
