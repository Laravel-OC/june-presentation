<html lang='en'>
<head>
    <meta charset='UTF-8' />
    <title>Laravel Developers</title>
</head>
<body>
	<div class='container col-md-6 col-md-offset-3'>
		@yield('content')
	</div>
	@if ($projects)
		@yield('js')
	@endif
</body>
</html>
