<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Inertia\Inertia;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $posts = Post::all();

        return Inertia::render('Note/Index', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return Inertia::render('Note/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request){
        $newData = $request->validated();

        $post = Post::create($newData);

        return to_route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post){
        return Inertia::render('Note/Show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post){
        return Inertia::render('Note/Edit', [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post){
        $updatedData = $request->validated();

        $post->update($updatedData);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post){
        $post->delete();
    }
}
