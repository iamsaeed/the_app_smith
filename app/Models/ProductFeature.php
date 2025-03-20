<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductFeature extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'product_id',
        'title',
        'description',
        'icon',
        'sort_order',
        'is_highlighted',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_highlighted' => 'boolean',
    ];

    /**
     * Get the product that owns the feature.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
