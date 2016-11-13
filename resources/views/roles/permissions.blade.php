@extends('layouts.app')

@section('content')

<form method="POST" action="/roles/{{ $role->id }}/permissions">
    {{ csrf_field() }}

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>{{ $role->label }}</strong> Permissions</div>

                    <div class="panel-body">
                        @foreach($permissions as $permission)
                        <li>
                            <label>
                                <input type="checkbox"
                                name="permissions[]"
                                value="{{ $permission->id }}"
                                {{ $role->hasPermission($permission) ? 'checked' : '' }}
                                >
                                <code>{{ $permission->name }}</code>
                                {{ $permission->label }}
                            </label>
                        </li>
                        @endforeach
                    </div>

                    <div class="panel-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="/roles" class="btn btn-default">Back to list</a>
                    </div>

                </div>
            </div>
        </div>
    </div>

</form>

@endsection
