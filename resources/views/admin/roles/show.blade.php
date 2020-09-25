@extends('layouts.admin')

@section('content')
	<div class="card">
		@if ( $role )
			<div class="card-body">

				<div class="form-group">
					<label>Name</label>
					<input type="text" readonly class="form-control" value="{{ $role->name }}" />
				</div>

				<div class="form-group">
					<label>Slug</label>
					<input type="text" readonly class="form-control" value="{{ $role->slug }}" />
				</div>

				<div class="form-group">
					<label>Permissions</label>
					<div class="row">
						<div class="col">
							@foreach ($role->permissions as $permission)
								<span class="badge badge-info mb-1">
									{{ $permission }}
								</span>
							@endforeach
						</div>
					</div>
				</div>

			</div>
		@else
			<h2 class="alert alert-info text-center">No Role found</h2>
		@endif
	</div> <!-- .card -->
@endsection
