@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Users</div>

                <div class="panel-body">

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Email</th>
                                <th>Roles</th>
                                <th>Special Permissions</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->email }}</td>
                            <td>
                                <ul>
                                    @foreach($user->roles as $role)
                                    <li>{{ $role->label }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <ul>
                                    @foreach($user->permissions as $permission)
                                    <li>
                                        <code>{{ $permission->name }}</code>
                                        {{ $permission->label }}
                                    </li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <a class="btn btn-primary" href="/users/{{ $user->id }}/roles">Roles</a>
                                <a class="btn btn-primary" href="/users/{{ $user->id }}/permissions">Permissions</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>

                    {{ $users->links() }}

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
