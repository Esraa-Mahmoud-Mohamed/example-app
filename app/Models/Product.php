<?php

namespace App\Models;

use App\Casts\TitleCast;
use App\Models\Media;
use App\Policies\ProductPolicy;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

#[Fillable(['name', 'slug', 'description', 'price', 'stock', 'is_featured'])]
// #[Sluggable(from: 'title', to: 'slug')]
#[UsePolicy(ProductPolicy::class)]
class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory, HasUuids, HasSlug;
    public $incrementing = false;
    protected $keyType = 'string';

    public function uniqueIds(): array
    {
        return ['id'];
    }

    protected $casts = [
        'name' => TitleCast::class,
    ];
    protected static function booted()
    {
        parent::boot();
        static::creating(function ($product) {
            $product->slug = Str::slug($product->name);
        });
    }

    public function getSlugOptions(): SlugOptions
    {
        $englishOptions = SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');

        return $englishOptions;
    }

    public function getRouteKeyName(): mixed
    {
        return 'slug';
    }
    public function images()
    {
        return $this->morphMany(Media::class, 'mediable');
    }
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
}
