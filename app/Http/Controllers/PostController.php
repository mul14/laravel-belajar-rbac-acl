<?php

namespace App\Http\Controllers;

use Gate;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('create', Post::class)) {
            return 'You don\'t have ability to create new post.';
        }

        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Gate::denies('create', Post::class)) {
            return 'You don\'t have ability to create new post.';
        }

        Post::create([
            'title' => trim($request->title),
            'body' => trim($request->body),
            'user_id' => auth()->user()->id,
        ]);

        return back()->withStatus('Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        if (Gate::denies('view', $post)) {
            return 'You don\'t have ability to view this post.';
        }

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if (Gate::denies('update', $post)) {
            return 'You don\'t have ability to edit this post.';
        }

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if (Gate::denies('update', $post)) {
            return 'You don\'t have ability to edit this post.';
        }

        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);

        $post->update([
            'title' => trim($request->title),
            'body' => trim($request->body),
            'user_id' => auth()->user()->id,
        ]);

        return back()->withStatus('Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if (Gate::denies('delete', $post)) {
            return 'You don\'t have ability to delete this post.';
        }

        $post->delete();

        return redirect('/posts')->withStatus('Success');
    }
}
