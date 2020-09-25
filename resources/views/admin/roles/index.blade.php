@extends('layouts.admin')

@section('content')
	<div class="card">
		<div class="card-header justify-content-between">
			<h3 class="text-info">All Roles</h3>
			<a href="{{ route('admin.roles.create') }}" class="btn btn-success">Add new</a>
		</div>
		<div class="card-body">
			<table class="table users-table table-responsive">
				<thead>
					<tr>
						<th><input type="checkbox" name=""></th>
						<th>Name</th>
						<th>Slug</th>
						<th>Permissions</th>
						<th>Options</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($roles as $role)
						<tr>
							<td><input type="checkbox" name="" value="[{{ $role->id }}]"></td>
							<td>{{ $role->name }}</td>
							<td>{{ $role->slug }}</td>
							<td>
								@foreach ($role->permissions as $permission)
									<span class="badge badge-info mb-1">
										{{ $permissions[$permission] }}
									</span>
								@endforeach
							</td>
							<td>
								<a href="{{ route('admin.roles.show', $role->id) }}" class="btn btn-sm btn-info">
									<i class="fa fa-eye"></i>
								</a>
								<a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-sm btn-warning">
									<i class="fa fa-edit"></i>
								</a>
								<form action="{{ route('admin.roles.destroy', $role->id) }}" class="d-inline" onsubmit="return confirm('Are You sure?')" method="post">
									@csrf @method('DELETE')
									<button type="submit" class="btn btn-sm btn-danger">
										<i class="fa fa-trash"></i>
									</button>
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection
