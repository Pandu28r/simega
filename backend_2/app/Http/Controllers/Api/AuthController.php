<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!Auth::attempt($credentials)){
            return response()->json([
                'message' => 'Authorized',
                'status' => 401
            ]);
        }

        $user = Auth::user();
        $token = $user->createToken('SiMEGA')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token,
            'status' => 200,
            'success' => true
        ]);
    }


    public function me(Request $request){
        return response()->json($request->user());
    }

    public function logout(Request $request){
        $token = $request->user()->currentAccessToken();

        if ($token) {
            $token->delete();
        }
        return response()->json([
            'message' => 'Logged Out',
            'status' => 200
        ]);
    }
}
