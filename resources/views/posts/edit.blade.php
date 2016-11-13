@extends('layouts.app')

@section('content')

<form method="POST" action="/posts/{{ $post->id }}">
    {{ csrf_field() }}
    {{ method_field('PUT') }}

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Create new post</div>

                    <div class="panel-body">

                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" value="{{ old('title', $post->title) }}" class="form-control">

                            @if ($errors->has('title'))
                                <div class="inline-block">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Body</label>
                            <textarea name="body" class="form-control" rows="7">{{ old('body', $post->body) }}</textarea>
                            @if ($errors->has('body'))
                                <div class="inline-block">
                                    {{ $errors->first('body') }}
                                </div>
                            @endif
                        </div>

                    </div>

                    <div class="panel-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="/posts/{{ $post->id }}" class="btn btn-default">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>

@endsection
