<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TokenResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //

    public function login(Request $request){
        $request->validate([
            'email'=> ['required', 'email'],
            'password' => ['required', 'max:200'],
        ]);

        $user = User::where('email', $request->email)->first();
        if($user && Hash::check($request->password, $user->password)){
            $token = $user->createToken($user->name);

            return response()->json([
                'user' => UserResource::make($user),
                'message' => 'Logged in successfully',
                'token' => $token->plainTextToken,
            ])->cookie('auth_token',$token->plainTextToken, 60, null, null, true, true);
        }

        return [
            'message' => 'The credentials are incorrect',
        ];
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();

        return [
            "message" => "Logout Successfully",
        ];
    }

    public function register(Request $request){
        $validated = $request->validate([
            'name' => ['required', 'max:255'],
            'email'=> ['required', 'email' , 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', 'max:200'],
        ]);

        $user = UserResource::make(User::create($validated));

        $token = $user->createToken($request->name);

        return[
            'user' => $user,
            'token' => TokenResource::make($token),
        ];
    }
}