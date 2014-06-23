@extends('partials.master')

@section('content')
	<h1>Projects due for {{ date('Y') }}</h1>
	@if(isset($projects))
		@foreach($projects as $project)
			<h3>Project: {{$project->project_name}}</h3>
			<p>Due Date: {{$project->due_date}}</p>
		@endforeach
	@else
		<p>All finished!</p>
	@endif
@stop
