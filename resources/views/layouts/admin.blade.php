<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- Title -->
	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- General CSS Files -->
	<link rel="stylesheet" href="{{ asset('admin/css/app.min.css') }}">
	@stack('stylesheet')
	<!-- Template CSS -->
	<link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('admin/css/components.css') }}">
	<!-- Custom style CSS -->
	<link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}">
	<link rel='shortcut icon' type='image/x-icon' href='{{ asset('admin/img/favicon.ico') }}' />

</head>
<body>
	<div class="app" id="app">
		<main>
			<div class="loader"></div>
			@include('admin.partials.sidenav')
			<!-- Main Content -->
			<div class="main-content">
				<section class="section">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-md-12">
								@if ( session()->get('status') )
									<div class="alert alert-success text-dark font-bold">
										{{ session()->get('message') }}
									</div>
								@endif
								@yield('content')
							</div>
						</div>
					</div>
				</section>
				@include( 'admin.partials.settings-sidebar' )
			</div>
			@include('admin.partials.footer')
		</main>
	</div>
	<!-- General JS Scripts -->
	<script src="{{ asset('admin/js/app.min.js') }}"></script>
	<!-- Template JS File -->
	<script src="{{ asset('admin/js/scripts.js') }}"></script>
	<!-- Custom JS File -->
	<script src="{{ asset('admin/js/custom.js') }}"></script>
	@stack('scripts')

</body>
</html>
