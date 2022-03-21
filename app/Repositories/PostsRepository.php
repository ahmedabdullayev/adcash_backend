<?php

namespace App\Repositories;

use App\Http\Requests\StorePostRequest;
use App\Interfaces\PostsRepositoryInterface;
use App\Models\Category;
use App\Models\Post;

class PostsRepository implements PostsRepositoryInterface
{

    public function createPost(StorePostRequest $request) : Post
    {
        $post = new Post;
        $post->content = $request->input('content');

        $post->save();

        $post->categories()->attach($request->input('category_ids'));

        return $post;
    }

    public function updatePost(StorePostRequest $request, Post $post): Post
    {
        $post->content = $request->input('content');

        $post->categories()->sync($request->input('category_ids'));

        $post->save();

        return $post;
    }

    public function getPostByCategoryId(Category $category)
    {
        return $category->posts->sortBy([['id', 'desc']])->load('categories');
    }

    public function getPost(Post $post)
    {
        return $post->load('categories');
    }

    public function deletePost(Post $post)
    {
        $post->delete();

        return $post;
    }
}
