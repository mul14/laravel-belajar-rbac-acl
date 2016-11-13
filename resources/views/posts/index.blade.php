@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Posts
                </div>

                <div class="panel-body">

                    <table class="">
                        @foreach($posts as $post)
                        <tr>
                            <td>
                                <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>

                    {{ $posts->links() }}

                </div>

                <div class="panel-footer">
                    @can('create', 'App\Post')
                    <a href="/posts/create" class="btn btn-primary">Create new post</a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
