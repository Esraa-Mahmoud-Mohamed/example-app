<?php

namespace App\Models;

use App\Policies\CompanySettingPolicy;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

#[Fillable('id', 'name', 'email', 'phone', 'address', 'logo', 'favicon', 'facebook', 'twitter', 'instagram', 'linkedin', 'footer_description', 'copyright')]
#[UsePolicy(CompanySettingPolicy::class)]
class CompanySetting extends Model
{


    public function uniqueIds(): array
    {
        return ['id'];
    }
}
