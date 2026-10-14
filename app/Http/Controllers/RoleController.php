<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Services\RoleService;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(private RoleService $roleService){}
    public function index()
    {
        $roles = Role::get();
        return view('admin.roles.all', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::get();
        return view('admin.roles.create', ['permissions' => $permissions]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        $data = $request->validated();
        $this->roleService->createRole($data);
        noty()->success('Role created successfully');
        return to_route('roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        $role->load('permissions');
        $permissions = Permission::select('id', 'name')->get();
        return view('admin.roles.show', ['role' => $role, 'permissions' => $permissions]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $role->load('permissions');
        $permissions = Permission::select('id', 'name')->get();
        return view('admin.roles.edit', ['role' => $role, 'permissions' => $permissions]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, Role $role)
    {
        // dd($request->validated());
        $this->roleService->updateRole($role, $request->validated());
        noty()->success('Role updated successfully');
        return to_route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $this->roleService->deleteRole($role);
        noty()->success('Role deleted successfully');
        return to_route('roles.index');
    }
}


