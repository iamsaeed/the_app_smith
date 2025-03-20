<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name',
        'type',
        'slug',
        'description',
        'bg',
        'text',
        'status',
        'parent_id',
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
    ];

    /**
     * Get the blogs for the category.
     */
    public function blogs(): MorphToMany
    {
        return $this->morphedByMany(Blog::class, 'categorizable');
    }

    /**
     * Get products that are categorized with this category.
     */
    public function products(): MorphToMany
    {
        return $this->morphedByMany(Product::class, 'categorizable');
    }

    /**
     * Scope a query to only include categories of a given type.
     */
    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }

    /**
     * Get the parent category.
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    /**
     * Get the child categories.
     */
    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    /**
     * Get the user who created the category.
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_id');
    }

    /**
     * Get the user who last updated the category.
     */
    public function updater(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_id');
    }
}
