<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\DB; 
use App\Models\User; 
use App\Models\Activity;; 
use Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    private $apiToken;
    public function __construct()
     {
     $this->apiToken = uniqid(base64_encode(Str::random(40)));
     $this->middleware('auth:api', ['except' => ['login', 'register']]);
     }

    public function login(Request $request){ 
        //User check
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
          $user = Auth::user(); 
        //Setting login response 
        $success['token'] = $this->apiToken;
        $success['name'] =  $user->name;
        //record activity
        Activity::create([
          'description' => "logged in successfully.",
          'created_by' => $user->id,
          'status' => 1
        ]);
          return response()->json([
            'status' => 'success',
            'data' => $success,
            'user'=> $user
          ]); 
        } else { 
          return response()->json([
            'status' => 'error',
            'data' => 'Unauthorized Access'
          ]); 
        } 
    }

    public function logout()
    {
        $accessToken = auth()->user()->token();

        // $refreshToken = DB::table('oauth_refresh_tokens')
        // ->where('access_token_id', $accessToken->id)
        // ->update([
        //     'revoked' => true
        // ]);

        $accessToken->revoke();

        return response()->json(['status' => 200]);
    }
}
