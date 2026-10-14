<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Http\Resources\RoleResource;
use App\Services\RoleService;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(private RoleService $roleService) {}
    public function index()
    {
        $roles = Role::get();
        return ApiResponse::response(RoleResource::collection($roles), 'Roles retrieved successfully', 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        $data = $request->validated();
        $this->roleService->createRole($data);
        return ApiResponse::response(new RoleResource($data), 'Role created successfully', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        $role->load('permissions');
        $permissions = Permission::select('id', 'name')->get();
        return ApiResponse::response([
            'role' => new RoleResource($role),
            // 'permissions' => $permissions
        ], 'Role retrieved successfully', 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
