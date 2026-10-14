<?php

namespace App\Models;

use App\Policies\TestimonialPolicy;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
#[Fillable(['message', 'user_id'])]
#[UsePolicy(TestimonialPolicy::class)]
class Testimonial extends Model
{
    /** @use HasFactory<\Database\Factories\TestimonialFactory> */
    use HasFactory,HasUuids;
    protected $with = ['user'];
    public $incrementing = false;
    protected $keyType = 'string';
    /**
     * Get the unique IDs for the model.
     */
    public function uniqueIds(): array
    {
        return ['id'];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->select('id', 'name');
    }
}
