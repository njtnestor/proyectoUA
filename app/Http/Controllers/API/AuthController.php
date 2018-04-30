<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use DB;
use Hash;

class AuthController extends Controller
{
    public function register(){
        User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);
        
        $data = [
            'grant_type' => 'password',
            'client_id' => '2',
            'client_secret' => 'NDjXdpvHhTQp4BEkeJRGT87D9wuMx2w97IK2jL8d',
            'username' => request('email'),
            'password' => request('password'),
            
        ];
        $user = User::whereEmail(request('email'))->first();
        $request = Request::create('/oauth/token', 'POST', $data);
        $response = app()->handle($request);
        // Get the data from the response
        $data = json_decode($response->getContent());
        return response()->json([
            'token' => $data->access_token,
            //console.log($data)
            'user' => $user,
            'status' => 200
        ]);
        //return response()->json(['status' => 201]);
    }
    public function login()
    {
        /*$data = [
            'grant_type' => 'password',
            'client_id' => '2',
            'client_secret' => 'NDjXdpvHhTQp4BEkeJRGT87D9wuMx2w97IK2jL8d',
            'username' => request('username'),
            'password' => request('password'),
        ];

        $request = Request::create('/oauth/token', 'POST', $data);
        return app()->handle($request);*/
        $user = User::whereEmail(request('username'))->first();
        if (!$user) {
            return response()->json([
                'message' => 'Wrong email or password1',
                'status' => 422
            ], 422);
        }

        // If a user with the email was found - check if the specified password
        // belongs to this user
        if (!Hash::check(request('password'), $user->password)) {
            return response()->json([
                'message' => 'Wrong email or password2',
                'status' => 422
            ], 422);
        }

        // Send an internal API request to get an access token
        $data = [
            'grant_type' => 'password',
            'client_id' => '2',
            'client_secret' => 'NDjXdpvHhTQp4BEkeJRGT87D9wuMx2w97IK2jL8d',
            'username' => request('username'),
            'password' => request('password'),
            
        ];

        $request = Request::create('/oauth/token', 'POST', $data);

        $response = app()->handle($request);

        // Check if the request was successful
        if ($response->getStatusCode() != 200) {
            return response()->json([
                'message' => 'Wrong email or password3',
                'status' => 422
            ], 422);
        }

        // Get the data from the response
        $data = json_decode($response->getContent());

        // Format the final response in a desirable format
        return response()->json([
             'token' => $data->access_token,
            //console.log($data)
            'user' => $user,
            'status' => 200
        ]);
    }
    public function logout()
    {
        $accessToken = auth()->user()->token();
        $refreshToken = DB::table('oauth_refresh_tokens')
            ->where('access_token_id', $accessToken->id)
            ->update([
                'revoked' => true
            ]);

        $accessToken->revoke();

        return response()->json(['status' => 200]);
    }
    
    public function getUser()
    {
        return auth()->user();
    }
}
