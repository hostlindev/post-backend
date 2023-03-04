<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\LoginResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function login(LoginRequest  $request)
    {

        $request->validated();


        if (!Auth::attempt(["email" => $request->email, "password" => $request->password])) {
            return
                response()->json([
                    "message" => "Las credenciales no son correctas."
                ], 404);
        }
        $user = User::where('email', $request->email)->first();
        $user['token'] = $user->createToken('TOKEN ' . $user->name)->plainTextToken;

        return response()->json([
            "message" => "Acceso correcto.",
            "data" => LoginResource::make($user),
        ], 200);
    }

    public function register(RegisterRequest $request)
    {
        $request->validated();

        $user = User::create([
            "name" => $request->name,
            "lastname" => $request->lastname,
            "username" => $request->username,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "permission_id" => User::PERMISSION["create"],
        ]);

        return response()->json([
            "message" => "El usuario ha sido creado.",
            "data" => $user,
        ], 200);
    }

    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();

        return response()->json([
            "message" => "Se ha cerrado la sesión."
        ], 200);
    }
}
