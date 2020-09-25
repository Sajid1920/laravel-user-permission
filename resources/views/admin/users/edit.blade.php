@extends('layouts.admin')

@section('content')
	<div class="card">
		<div class="card-header justify-content-between">
			<h3 class="text-info">Edit User</h3>
			<a href="{{ route('admin.users.create') }}" class="btn btn-success">Add new</a>
		</div>
		<form class="form card-body" method="post" action="{{ route('admin.users.update', $user->id) }}" enctype="multipart/form-data">
			@method('PUT')
			@csrf
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}" />
				@error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}" />
				@error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
			</div>
			<div class="form-group">
				<label for="password">password</label>
				<input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" />
				@error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
			</div>

			<div class="form-group">
				<label>Role</label>
				<select class="form-control @error('role_id') is-invalid @enderror" name="role_id">
					@foreach ($roles as $id => $name)
					<option value="{{ $id }}" {{ $user->role_id == $id ? 'selected' : '' }}>{{ $name }}</option>
					@endforeach
				</select>
				@error('role_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
			</div>

			<div class="form-group">
				<input type="submit" class="btn btn-warning" value="UPDATE" />
			</div>
		</form>
	</div> <!-- .card -->
@endsection
