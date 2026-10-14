<?php

namespace App\Models;

use App\Policies\TeamMemberPolicy;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
#[Fillable(['position', 'bio', 'user_id'])]
#[UsePolicy(TeamMemberPolicy::class)]
class TeamMember extends Model
{
    /** @use HasFactory<\Database\Factories\TeamMemberFactory> */
    use HasFactory, HasUuids;
    protected $with = ['user'];
    public $incrementing = false;
    protected $keyType = 'string';

    public function uniqueIds(): array
    {
        return ['id'];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->select('id', 'name', 'email');
    }
}
