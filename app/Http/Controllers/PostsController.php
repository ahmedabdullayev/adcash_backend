<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class PostsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  StorePostRequest  $request
     * @return JsonResponse
     */
    public function store(StorePostRequest $request): JsonResponse
    {
        $post = new Post;
        $post->content = $request->input('content');

        $post->save();

        $post->categories()->attach($request->input('category_ids'));

        return response()->json($post);
    }

    public function updatePost(StorePostRequest $request, Post $post): JsonResponse
    {
        $post->content = $request->input('content');

        $post->categories()->sync($request->input('category_ids'));

        $post->save();

        return response()->json($post);
    }
    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return JsonResponse
     */
    public function showByCategoryId(Category $category): JsonResponse
    {
        return response()->json($category->posts->sortBy([['id', 'desc']])->load('categories'));
    }

    public function showPost(Post $post): JsonResponse
    {
        $post->load('categories');

        return response()->json($post);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return JsonResponse
     */
    public function destroy(Post $post): JsonResponse
    {
        $post->delete();

        return response()->json($post);
    }
}
