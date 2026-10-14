<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CompanySettingController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\TeamMemberController;
use App\Http\Controllers\Api\TestimonialController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get("/hello", function () {
    return response()->json(["message" => "Hello, World!"]);
});

Route::get('register', [AuthController::class, 'register']);
Route::get('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->name('api.')->group(function () {
    Route::apiResource('users', UserController::class);
    Route::apiResource('posts', PostController::class);
    Route::apiResource('products', ProductController::class);
    Route::apiResource('roles', RoleController::class);
    Route::apiResource('services', ServiceController::class);
    Route::apiResource('testimonials', TestimonialController::class);
    Route::apiResource('team-members', TeamMemberController::class);
    Route::get(
        'company-settings',
        [CompanySettingController::class, 'show']
    );

    Route::post(
        'company-settings',
        [CompanySettingController::class, 'update']
    );

    Route::post(
        'company-settings/reset',
        [CompanySettingController::class, 'reset']
    );
});
