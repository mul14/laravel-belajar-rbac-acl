@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					Roles
					<a href="/roles/create" class="btn btn-link">Create</a>
				</div>

				<div class="panel-body">
					<table class="table">
						<thead>
							<tr>
								<th>#</th>
								<th>Role name</th>
								<th>Permissions</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($roles as $key => $role)
							<tr>
								<td>{{ $key +1 }}</td>
								<td>{{ $role->label }}</td>
								<td>
									<ul>
									@foreach($role->permissions as $permission)
										<li><code>{{ $permission->name }}</code> {{ $permission->label }}</li>
									@endforeach
									</ul>
								</td>
								<td>
									<a href="/roles/{{ $role->id }}/edit" class="btn btn-primary">Edit</a>
									<a href="/roles/{{ $role->id }}/permissions" class="btn btn-primary">Permissions</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>

				</div>

			</div>
		</div>
	</div>
</div>

@endsection
