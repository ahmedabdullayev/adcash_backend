<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
class PostsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $post = new Post;
        $post->content = $request->input('content');

        $post->save();

        $post->categories()->attach($request->input('category_ids'));

        return response()->json($post);
    }

    public function updatePost(StorePostRequest $request, Post $post)
    {
        $post->content = $request->input('content');

        $post->categories()->sync($request->input('category_ids'));

        $post->save();

        return response()->json($post);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function showByCategoryId(Category $category)
    {
        return response()->json($category->posts->load('categories'));
    }

    public function showPost(Post $post)
    {
       $post->load('categories');

        return response()->json($post);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return response()->json($post);
    }
}
