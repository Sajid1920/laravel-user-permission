@extends('layouts.admin')

@section('content')
	<div class="card">
		@if ($user)
			<div class="card-header justify-content-between">
				<h3 class="text-info">{{ $user->name }}</h3>
				<a href="{{ route('admin.users.create') }}" class="btn btn-success">Add new</a>
			</div>
			<div class="card-body">

				<div class="form-group">
					<label>Name</label>
					<input type="text" readonly class="form-control" value="{{ $user->name }}" />
				</div>

				<div class="form-group">
					<label>Email</label>
					<input type="text" readonly class="form-control" value="{{ $user->email }}" />
				</div>

			</div>
		@else
			<h2 class="alert alert-info text-center">No User found</h2>
		@endif
	</div> <!-- .card -->
@endsection
