<?php

namespace Tests\Feature;

use Tests\TestCase;

class PostEndPointsTest extends TestCase
{
    public function test_get_post()
    {
        $response = $this->get('/api/post/8');

        $response->assertStatus(200);
    }
    public function test_get_post_by_categoryId()
    {
        $response = $this->get('/api/posts/15');

        $response->assertStatus(200);
    }

    public function test_delete_post()
    {
        $response = $this->delete('/api/category/19');

        $response->assertStatus(200);
    }
    public function test_put_post()
    {
        $response = $this->put('/api/post/8', ['content'=> 'My post edit test', 'category_ids' => [14, 15]]);

        $response->assertStatus(200);
    }
    public function test_post_post()
    {
        $response = $this->post('/api/posts', ['content'=> 'My new test post', 'category_ids' => [14, 15]]);

        $response->assertStatus(200);
    }
}
