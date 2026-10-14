<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'medias';
    use HasUuids;
    protected $guarded = [];

    /**
    * Get the columns that should receive a unique identifier.
    *
    * @return array<int, string>
    */
    public function uniqueIds(): array
    {
        return ['id'];
    }

    public function mediable()
    {
        return $this->morphTo();
    }
}
