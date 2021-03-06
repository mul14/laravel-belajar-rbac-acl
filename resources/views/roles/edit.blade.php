@extends('layouts.app')

@section('content')

<form method="POST" action="/roles/{{ $role->id }}">
    {{ csrf_field() }}
    {{ method_field('PUT') }}

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit role {{ $role->name }}</div>

                    <div class="panel-body">
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">Name</label>

                            <input type="text" name="name" value="{{ old('name', $role->name) }}" id="name" class="form-control">

                            @if ($errors->has('name'))
                                <div class="help-block">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>


                        <div class="form-group {{ $errors->has('label') ? 'has-error' : '' }}">
                            <label for="label">Label</label>

                            <input type="text" name="label" value="{{ old('label', $role->label) }}" id="label" class="form-control">

                            @if ($errors->has('label'))
                                <div class="help-block">
                                    {{ $errors->first('label') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="panel-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="/roles" class="btn btn-default">Back to list</a>
                    </div>

                </div>
            </div>
        </div>
    </div>

</form>


@endsection
