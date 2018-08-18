<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;

class RecipeTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testIndexRecipe()
    {
        $response = $this->json('GET', '/api/recipes');
        $response->assertStatus(200);
    }

    public function testShowProduct()
    {
        $response = $this->json('GET', '/api/recipes/1');
        $response->assertStatus(200);
    }
    public function testRecipeIndexByProductId()
    {
        $response = $this->json('GET', '/api/products/2/recipes');
        $response->assertStatus(200);
    }
    public function testRecipeOUtstanding()
    {
        $response = $this->json('GET', '/api/products/2/recipes/outstanding');
        $response->assertStatus(200);
    }

    public function testRecipesByUser(){

        Passport::actingAs(
            factory(\App\User::class)->create()
        );
        $response = $this->json('GET', '/api/recipesByUser');
        $response->assertStatus(200);
    }
}
