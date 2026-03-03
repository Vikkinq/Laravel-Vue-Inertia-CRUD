<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request){

        $sort = $request->get('sort', 'newest');

        $post = Post::query();

        if($sort === 'oldest'){
            $post->orderBy('created_at', 'asc');
        } else {
            $post->orderBy('created_at', 'desc');
        }

        $paginatedPosts = $post->paginate(5)->withQueryString();

        return Inertia::render('Note/Index', [
            'posts' => $paginatedPosts->items(),
            'pagination' => [
                'total' => $paginatedPosts->total(),
                'per_page' => $paginatedPosts->perPage(),
                'current_page' => $paginatedPosts->currentPage(),
                'last_page' => $paginatedPosts->lastPage(),
            ]
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

        return to_route('notes.index');
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
        $post->update($request->validated());

        // return $this->index();
        // return redirect()->route('/notes');
        return Inertia::location(route('notes.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post){
        $post->delete();

        // return Inertia::render('Note/Index', [
        //     'posts' => Post::all()
        // ]);
        return Inertia::location(route('notes.index'));
    }
}
