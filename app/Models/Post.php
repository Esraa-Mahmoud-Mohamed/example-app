<?php

namespace App\Models;

use App\Casts\TitleCast;
use App\Models\Media;
use App\Policies\PostPolicy;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;
use Spatie\Sluggable\Attributes\Sluggable;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

#[Fillable(['title', 'slug', 'content','title_ar', 'slug_ar', 'content_ar', 'user_id'])]
// #[Sluggable(from: 'title', to: 'slug')]
#[UsePolicy(PostPolicy::class)]
class Post extends Model
{
    use HasUuids, HasSlug, HasFactory;
    protected $with = ['user'];
    public $incrementing = false;
    protected $keyType = 'string';

    // protected function title(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value) => ucwords($value),
    //         set: fn ($value) => strtolower($value),
    //     );
    // }

    protected $casts = [
        'title' => TitleCast::class,
    ];

    protected static function booted()
    {
        parent::boot();
        static::creating(function ($post) {
            $post->slug = Str::slug($post->title);
            $post->slug_ar = preg_replace('/[^\p{Arabic}\p{L}\p{N}\s-]/u', '', $post->title_ar);
        });
    }

    public function getSlugOptions(): SlugOptions
    {
        $englishOptions = SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');

        $arabicOptions = SlugOptions::create()
            ->generateSlugsFrom('title_ar')
            ->saveSlugsTo('slug_ar');

        return app()->getLocale() === 'ar' ? $arabicOptions : $englishOptions;
    }

    // protected $fillable = [
    //     'title',
    //     'slug',
    //     'content',
    //     'user_id',
    // ];
    // protected $guarded = ['id'];
    /**
     * Get the columns that should receive a unique identifier.
     *
     * @return array<int, string>
     */
    public function uniqueIds(): array
    {
        return ['id'];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->select('id', 'name');
    }

    public function getRouteKeyName(): mixed
    {
        return 'slug';
    }

    public function images()
    {
        return $this->morphMany(Media::class, 'mediable');
    }

    public function categories() : BelongsToMany
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }
}
