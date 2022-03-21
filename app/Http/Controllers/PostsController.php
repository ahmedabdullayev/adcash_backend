<?php

namespace App\Http\Controllers;

use App\Interfaces\PostsRepositoryInterface;
use App\Models\Category;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use Illuminate\Http\JsonResponse;

class PostsController extends Controller
{
    private PostsRepositoryInterface $postsRepository;

    public function __construct(PostsRepositoryInterface $postsRepository)
    {
        $this->postsRepository = $postsRepository;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StorePostRequest  $request
     * @return JsonResponse
     */
    public function store(StorePostRequest $request): JsonResponse
    {
        return response()->json($this->postsRepository->createPost($request));
    }
    /**
     * Update resource in storage.
     *
     * @param  StorePostRequest  $request
     * @param  Post $post
     * @return JsonResponse
     */
    public function updatePost(StorePostRequest $request, Post $post): JsonResponse
    {
        return response()->json($this->postsRepository->updatePost($request, $post));
    }
    /**
     * Display the specified resource by category id.
     *
     * @param Category $category
     * @return JsonResponse
     */
    public function showByCategoryId(Category $category): JsonResponse
    {
        return response()->json($this->postsRepository->getPostByCategoryId($category));
    }
    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return JsonResponse
     */
    public function showPost(Post $post): JsonResponse
    {
        return response()->json($this->postsRepository->getPost($post));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return JsonResponse
     */
    public function destroy(Post $post): JsonResponse
    {
        return response()->json($this->postsRepository->deletePost($post));
    }
}
