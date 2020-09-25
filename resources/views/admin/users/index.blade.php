@extends('layouts.admin')

@section('content')
	<div class="card">
		<div class="card-header justify-content-between">
			<h3 class="text-info">All Users</h3>
			<a href="{{ route('admin.users.create') }}" class="btn btn-success">Add new</a>
		</div>
		<div class="card-body">
			<table class="table table-sm-responsive">
				<thead>
					<tr>
						<th><input type="checkbox" name=""></th>
						<th>Name</th>
						<th>Email</th>
						<th>Role</th>
						<th>Options</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($users as $user)
						<tr>
							<td><input type="checkbox" name="" value="[{{ $user->id }}]"></td>
							<td>{{ $user->name }}</td>
							<td>{{ $user->email }}</td>
							<td>@isset ($user->role->name){{ $user->role->name }}@endisset</td>
							<td>
							    <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-sm btn-info">
							    	<i class="fa fa-eye"></i>
							    </a>
							    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-warning">
							    	<i class="fa fa-edit"></i>
							    </a>
							    <form action="{{ route('admin.users.destroy', $user->id) }}" class="d-inline" onsubmit="return confirm('Are You sure?')" method="post">
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
