<?php

namespace App\Policies;

use App\Models\CompanySetting;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CompanySettingPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view company-setting');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, CompanySetting $companySetting): bool
    {
        return $user->can('view company-setting');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): bool
    {
        return $user->can('edit company-setting');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function reset(User $user): bool
    {
        return $user->can('reset company-setting');
    }
}
