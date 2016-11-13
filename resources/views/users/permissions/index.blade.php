@extends('layouts.app')

@section('content')

<form action="/users/{{ $user->id }}/permissions" method="POST">
{{ csrf_field() }}

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>{{ $user->name }} ({{ $user->email }})</strong> Permissions</div>

                    <div class="panel-body">

                        @foreach($permissions as $permission)
                        <li>
                            <label>
                                <input type="checkbox"
                                name="permission[]"
                                value="{{ $permission->id }}"
                                {{ $user->hasPermission($permission) ? 'checked' : '' }}
                                >
                                 <code>{{ $permission->name }}</code>
                                 {{ $permission->label }}
                            </label>
                        </li>
                        @endforeach
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
