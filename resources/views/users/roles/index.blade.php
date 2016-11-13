@extends('layouts.app')

@section('content')

<form method="POST" action="/users/{{ $user->id }}/roles">
	{{ csrf_field() }}
	{{ method_field('POST') }}

	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading"><strong>{{ $user->name }} ({{ $user->email }})</strong> Roles</div>

					<div class="panel-body">

						<ul>
							@foreach($roles as $key => $role)
							<li>

								<label>
									<input
									type="checkbox"
									name="role[]"
									value="{{ $role->id }}"
									{{ $user->hasRole($role) ? 'checked' : '' }}
									>
									{{ $role->label }}
								</label>
							</li>
							@endforeach
						</ul>
					</div>

					<div class="panel-footer">
						<button type="submit" class="btn btn-primary">Submit</button>
						<a class="btn btn-default" href="/users">Back to list</a>
					</div>


				</div>
			</div>
		</div>
	</div>

</form>

@endsection
