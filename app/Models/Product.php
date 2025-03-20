<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name',
        'slug',
        'short_description',
        'description',
        'product_type',
        'status',
        'featured',
        // SEO fields
        'meta_title',
        'meta_description',
        'meta_keywords',
        'og_image',
        'og_title',
        'og_description',
        // Tracking
        'created_id',
        'updated_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'status' => 'boolean',
        'featured' => 'boolean',
        'meta_keywords' => 'array',
    ];

    /**
     * Register media collections for the product.
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('featured_image')
            ->singleFile()
            ->registerMediaConversions(function (Media $media) {
                $this->addMediaConversion('thumb')
                    ->width(200)
                    ->height(150)
                    ->sharpen(10);

                $this->addMediaConversion('medium')
                    ->width(640)
                    ->height(480)
                    ->sharpen(10);

                $this->addMediaConversion('large')
                    ->width(1200)
                    ->height(800)
                    ->sharpen(10);
            });

        $this->addMediaCollection('screenshots')
            ->registerMediaConversions(function (Media $media) {
                $this->addMediaConversion('thumb')
                    ->width(200)
                    ->height(150)
                    ->sharpen(10);

                $this->addMediaConversion('medium')
                    ->width(640)
                    ->height(480)
                    ->sharpen(10);
            });
    }

    /**
     * Get all of the product details.
     */
    public function details(): HasOne
    {
        return $this->hasOne(ProductDetail::class);
    }

    /**
     * Get all of the features for the product.
     */
    public function features(): HasMany
    {
        return $this->hasMany(ProductFeature::class);
    }

    /**
     * Get all of the pricing plans for the product.
     */
    public function pricingPlans(): HasMany
    {
        return $this->hasMany(ProductPricingPlan::class);
    }

    /**
     * Get all of the categories for the product.
     */
    public function categories(): MorphToMany
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }

    /**
     * Get all of the tags for the product.
     */
    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    /**
     * Get all of the testimonials for the product.
     */
    public function testimonials(): MorphMany
    {
        return $this->morphMany(Testimonial::class, 'testimonialable');
    }

    /**
     * Get all of the FAQs for the product.
     */
    public function faqs(): MorphMany
    {
        return $this->morphMany(Faq::class, 'faqable');
    }

    /**
     * Get the user who created the product.
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_id');
    }

    /**
     * Get the user who last updated the product.
     */
    public function updater(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_id');
    }

    /**
     * Get the URL for the product.
     */
    public function getUrlAttribute(): string
    {
        return url("/products/{$this->slug}");
    }

    /**
     * Scope a query to only include active products.
     */
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    /**
     * Scope a query to only include featured products.
     */
    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }
}
