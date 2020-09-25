@extends('layouts.admin')

@section('content')
	<div class="card">
		<div class="card-header justify-content-between">
			<h3 class="text-info">Add New User</h3>
		</div>
		<form class="form card-body" method="post" action="{{ route('admin.users.store') }}" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" />
				@error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" />
				@error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" />
				@error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
			</div>
			<div class="form-group">
				<label>Roles</label>
				<select class="form-control @error('role_id') is-invalid @enderror" name="role_id">
					@foreach ($roles as $id => $name)
					<option value="{{ $id }}" {{ old('role_id') == $id ? 'selected' : '' }}>{{ $name }}</option>
					@endforeach
				</select>
				@error('role_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-info" value="CREATE" />
			</div>
		</form>
	</div>
@endsection
