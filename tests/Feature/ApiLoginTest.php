<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\OauthClients;

class ApiLoginTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testApiLogin() {
        $body = [
            'username' => 'nestor@gmail.com',
            'password' => 'secret',
        ];
        /*$this->post('api/login', $body)
             ->assertStatus(200);

        $this->json('POST','api/login',$body,['Content-Type' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure(['token_type','expires_in','access_token','refresh_token']);*/

            $response = $this->get('/');
            $response = $this->json('POST', '/api/login', ['username' => 'nestor@gmail.com','password' => 'secret']);

            $response->assertStatus(200);
    }

    public function testOauthLogin() {
        
        $oauth_client = OauthClients::findOrFail(2);

        $body = [
            'username' => 'nestor@gmail.com',
            'password' => 'secret',
            'client_id' => 2,
            'client_secret' => $oauth_client->secret,
            'grant_type' => 'password',
            'scope' => '*'
        ];
        $this->json('POST','/oauth/token',$body,['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure(['token_type','expires_in','access_token','refresh_token']);
    }
    public function testExample()
    {
        $this->assertTrue(true);
    }
}
