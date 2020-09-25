<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- Title -->
	<title>{{ config('app.name', 'Laravel CMS') }}</title>

	<!-- General CSS Files -->
	<link rel="stylesheet" href="{{ asset('admin/css/app.min.css') }}">
	<!-- Template CSS -->
	<link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('admin/css/components.css') }}">
	<!-- Custom style CSS -->
	<link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}">

</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col">
				<ul class="nav nav-tabs">
					<li class="nav-item">
						<a href="{{ url('/') }}" class="nav-link">Home</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="app" id="app">

		<main class="d-flex align-items-center" style="height: 500px">
			<div class="loader"></div>
			@yield('content')
		</main>
	</div>
	<!-- General JS Scripts -->
	<script src="{{ asset('admin/js/app.min.js') }}"></script>
	<!-- Template JS File -->
	<script src="{{ asset('admin/js/scripts.js') }}"></script>
	<!-- Custom JS File -->
	<script src="{{ asset('admin/js/custom.js') }}"></script>

</body>
</html>
