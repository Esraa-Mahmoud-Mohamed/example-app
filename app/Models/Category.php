<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasUuids;
    protected $fillable = ['name'];

    public function uniqueIds(): array
    {
        return ['id'];
    }
    public function posts() : BelongsToMany
    {
        return $this->belongsToMany(Post::class)->withTimestamps();
    }
}
