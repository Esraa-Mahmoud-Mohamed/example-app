<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
#[Fillable(['name','email'])]
class Newsletter extends Model
{
    use HasUuids;
    public function uniqueIds(): array
    {
        return ['id'];
    }
}
