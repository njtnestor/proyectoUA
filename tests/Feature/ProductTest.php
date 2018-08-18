<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testIndexProduct()
    {
        $response = $this->json('GET', '/api/products');
        $response->assertStatus(200);
    }

    public function testShowProduct()
    {
        $response = $this->json('GET', '/api/products/2');
        $response->assertStatus(200);
    }
}
