<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Testimonial extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'testimonialable_type',
        'testimonialable_id',
        'customer_name',
        'customer_position',
        'customer_company',
        'comment',
        'rating',
        'is_featured',
        'status',
        'sort_order',
        'created_id',
        'updated_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'rating' => 'decimal:1',
        'is_featured' => 'boolean',
        'status' => 'boolean',
    ];

    /**
     * Register media collections for the testimonial.
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatar')
            ->singleFile()
            ->registerMediaConversions(function (Media $media) {
                $this->addMediaConversion('thumb')
                    ->width(100)
                    ->height(100)
                    ->sharpen(10);
            });
    }

    /**
     * Get the parent testimonialable model.
     */
    public function testimonialable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Get the user who created the testimonial.
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_id');
    }

    /**
     * Get the user who last updated the testimonial.
     */
    public function updater(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_id');
    }

    /**
     * Scope a query to only include active testimonials.
     */
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    /**
     * Scope a query to only include featured testimonials.
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }
}
