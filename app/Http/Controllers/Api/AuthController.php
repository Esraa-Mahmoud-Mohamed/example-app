<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => ['required', 'string', 'min:8', 'confirmed', Password::defaults()],
        ]);

        if ($validator->fails()) {
            return ApiResponse::response(null, $validator->errors(), 422);
        }

        $validatedData = $validator->validated();

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
        ]);

        $data['token'] = $user->createToken('registerUser')->plainTextToken;
        $data['name'] = $user->name;
        $data['email'] = $user->email;

        return ApiResponse::response($data, 'User registered successfully', 201);
    }

    // public function login(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'email' => 'required|string|email',
    //         'password' => 'required|string',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json([
    //             'data' => $validator->errors(),
    //             'status' => 422,
    //             'message' => 'Validation failed',
    //         ], 422);
    //     }

    //     // $validatedData = $validator->validated();

    //     if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
    //         $user = Auth::user();
    //         $data['token'] = $user->createToken('loginUser')->plainTextToken;
    //         $data['name'] = $user->name;
    //         $data['email'] = $user->email;

    //         return response()->json([
    //             'data' => $data,
    //             'status' => 200,
    //             'message' => 'User logged in successfully',
    //         ], 200);
    //     }
    //     return response()->json([
    //         'data' => null,
    //         'status' => 401,
    //         'message' => 'Invalid credentials',
    //     ], 401);
    // }



    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return ApiResponse::response(null, $validator->errors(), 422);
        }

        $validatedData = $validator->validated();

        $user = User::where('email', $validatedData['email'])->first();

        if (!$user || !Hash::check(
            $validatedData['password'],
            $user->password
        )) {
            return ApiResponse::response(null, 'Invalid credentials', 401);
        }

        $token = $user->createToken('loginUser')->plainTextToken;

        return ApiResponse::response([
            'token' => $token,
            'name' => $user->name,
            'email' => $user->email,
        ], 'User logged in successfully', 200);
    }
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return ApiResponse::response(null, 'User logged out successfully', 200);
    }
}
