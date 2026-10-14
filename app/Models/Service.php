<?php

namespace App\Models;

use App\Casts\TitleCast;
use App\Policies\ServicePolicy;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
#[Fillable(['title', 'details'])]
#[UsePolicy(ServicePolicy::class)]
class Service extends Model
{
    /** @use HasFactory<\Database\Factories\ServiceFactory> */
    use HasFactory,HasUuids;

    protected $casts = [
        'title' => TitleCast::class,
    ];

    public function uniqueIds(): array
    {
        return ['id'];
    }

    public function images()
    {
        return $this->morphMany(Media::class, 'mediable');
    }
}
