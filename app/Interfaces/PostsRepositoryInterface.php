<?php

namespace App\Interfaces;

use App\Http\Requests\StorePostRequest;
use App\Models\Category;
use App\Models\Post;

interface PostsRepositoryInterface
{
    public function createPost(StorePostRequest $request);
    public function updatePost(StorePostRequest $request, Post $post);
    public function getPostByCategoryId(Category $category);
    public function getPost(Post $post);
    public function deletePost(Post $post);
}
