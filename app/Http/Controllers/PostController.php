<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Resources\Post as PostResource;


class PostController extends Controller
{
    protected $limit=10;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts=Post::latest()->simplePaginate($this->limit);
        //return posts collection as a resource
        return PostResource::collection($posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post=$request->isMethod('put')?Post::findOrFail
        ($request->post_id):new Post;
        $post->id=$request->input('post_id');
        $post->title=$request->input('title');
        $post->body=$request->input('body');

        if($post->save()){
            return new PostResource($post);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post=Post::findOrFail($id);
        return new PostResource($post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post=Post::findOrFail($id);
        if($post->delete()){
            return new PostResource($post);
        }
    }
}
