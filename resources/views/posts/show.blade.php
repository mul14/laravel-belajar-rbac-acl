@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Show post of ID {{ $post->id }}
                </div>

                <div class="panel-body">
                    <h3>{{ $post->title }}</h3>

                    <div>
                        {{ nl2br($post->body) }}
                    </div>
                </div>

                <div class="panel-footer">
                    @can('update', $post)
                        <a href="/posts/{{ $post->id }}/edit" class="btn btn-primary">Edit</a>
                    @endcan

                    @can('delete', $post)
                    <form method="POST" action="/posts/{{ $post->id }}" style="display: inline;">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" onclick="return confirm('Sure?')" class="btn btn-default">Delete</button>
                    </form>
                    @endcan

                    <a href="/posts" class="btn btn-default">Back to list</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
