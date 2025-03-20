<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PlanFeature extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'product_pricing_plan_id',
        'feature_description',
        'is_included',
        'sort_order',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_included' => 'boolean',
    ];

    /**
     * Get the pricing plan that owns the feature.
     */
    public function pricingPlan(): BelongsTo
    {
        return $this->belongsTo(ProductPricingPlan::class, 'product_pricing_plan_id');
    }
}
