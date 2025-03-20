<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductDetail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'product_id',
        'version',
        'release_date',
        'tech_stack',
        'system_requirements',
        'installation_guide',
        'demo_url',
        'documentation_url',
        'github_url',
        'support_email',
        'support_expires_at',
        'lifetime_updates',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'release_date' => 'date',
        'tech_stack' => 'array',
        'system_requirements' => 'array',
        'support_expires_at' => 'date',
        'lifetime_updates' => 'boolean',
    ];

    /**
     * Get the product that owns the detail.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
