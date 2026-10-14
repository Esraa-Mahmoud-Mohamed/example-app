<?php

namespace App\Services;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleService
{
    public function createRole(array $data)
    {
        $role = Role::create(['name' => $data['name']]);
        // $role->syncPermissions($data['permissions']);
        $role->syncPermissions(
            Permission::whereIn('id', $data['permissions'])->get()
        );
        return $role;
    }

    public function updateRole(Role $role, array $data)
    {
        // dd($data['permissions']);
        $role->permissions()->sync($data['permissions']);
        // $data['user_id'] = Auth::id();
        $role->update($data);
        return $role;
    }

    public function deleteRole(Role $role)
    {
        $role->delete();
    }
}
