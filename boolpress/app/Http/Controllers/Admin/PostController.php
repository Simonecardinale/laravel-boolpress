<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Tag;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        $data = ['posts' => $posts];
        return view('admin.post.index', $data);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $data = ['tags'=> $tags];
        return view('admin.post.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $idUser = Auth::id();
        $newPost = new Post();
        $newPost ->user_id = $idUser;
        $newPost->slug = Str::slug($data['title']);
        // $newPost -> fill($data);
        $newPost ->title = $data['title'];
        $newPost ->content = $data['content'];
        $cover_path = Storage::put('post_covers', $data['image']);
        $data['cover'] = $cover_path;
        $newPost -> cover = $data['cover'];

        $newPost->save();
        if(array_key_exists('tags', $data)){
            $newPost -> tags() -> sync($data['tags']);
        };

        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $data = ['item' => $post];
        return view('admin.post.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = Tag::all();
        $data = ['item' => $post, 'tags'=> $tags];
        return view('admin.post.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();
        $cover_path = Storage::put('post_covers', $data['image']);
        $data['cover'] = $cover_path;
        $post->update($data);

        if(array_key_exists('tags', $data)){
            $post -> tags() -> sync($data['tags']);
        };

       return redirect()->route('post.index', $post);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post -> tags()->sync();
        $post-> delete();
        return redirect()-> route('post.index');
    }
}
