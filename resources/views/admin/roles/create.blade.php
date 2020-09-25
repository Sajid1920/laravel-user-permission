@extends('layouts.admin')

@section('content')
	<div class="card">
		<div class="card-header justify-content-between">
			<h3 class="text-info">Add New Role</h3>
		</div>
		<form class="form card-body" method="post" action="{{ route('admin.roles.store') }}">
			@csrf
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" />
				@error('name')
					<div class="invalid-feedback">{{ $message }}</div>
				@enderror
			</div>
			<div class="form-group">
				<label for="slug">Slug</label>
				<input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" />
				@error('slug')
					<div class="invalid-feedback">{{ $message }}</div>
				@enderror
			</div>

			@if (isset($permissions) && is_array($permissions))
			<div class="form-group">
				<label>Permissions</label>
				<select class="form-control select2" multiple="" name="permissions[]">
					@foreach ($permissions as $permissionId => $permissionName)
						<option value="{{ $permissionId }}">
							{{ $permissionName }}
						</option>
					@endforeach
				</select>
			</div>
			@endif

			<div class="form-group">
				<input type="submit" class="btn btn-warning" value="Add" />
			</div>
		</form>
	</div>
@endsection

@push('stylesheet')
	<link rel="stylesheet" href="{{ asset('admin') }}/plugins/select2/dist/css/select2.min.css">
@endpush

@push('scripts')
	<script src="{{ asset('admin') }}/plugins/select2/dist/js/select2.full.min.js"></script>
@endpush