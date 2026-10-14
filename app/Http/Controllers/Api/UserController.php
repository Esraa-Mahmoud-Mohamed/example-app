<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Traits\ImageTrait;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    use ImageTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return ApiResponse::response(UserResource::collection($users), 'Users retrieved successfully', 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $data = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => $request->password,
        ]);
        $role = Role::findorFail($request->role);

        $data->assignRole($role);
        return ApiResponse::response(new UserResource($data), 'User created successfully', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        Gate::authorize('view user');
        $user->load(['posts']);
        return ApiResponse::response(new UserResource($user), 'User retrieved successfully', 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        Gate::authorize('edit user');
        $data = $request->validated();
        if (array_key_exists('role', $data)) {
            $user->roles()->sync($data['role']);
        }
        $user->update($data);
        if ($request->hasFile('image')) {
            $oldImage = $user->images()->first();
            if ($oldImage) {
                $newPath = $this->updateImage($request->file('image'), 'users', $oldImage->path);

                $oldImage->update([
                    'path' => $newPath
                ]);
            } else {
                $newPath = $this->uploadImage($request->file('image'), 'users');

                $user->images()->create([
                    'path' => $newPath
                ]);
            }
        }
        return ApiResponse::response(new UserResource($user), 'User updated successfully', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        Gate::authorize('delete user');
        if ($user->images()->exists()) {

            $image = $user->images()->first();
            $this->deleteImage($image->path);

            $image->delete();
        }
        $user->delete();
        return ApiResponse::response(null, 'User deleted successfully', 200);
    }
}
