<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryEndPointsTest extends TestCase
{
    public function test_get_categories()
    {
        $response = $this->get('/api/categories');

        $response->assertStatus(200);
    }
    public function test_post_category()
    {
        $response = $this->post('/api/category', ['name' => 'TestCategory']);

        $response->assertStatus(200);
    }
    public function test_delete_category()
    {
        $response = $this->delete('/api/category/19');

        $response->assertStatus(200);
    }
}
