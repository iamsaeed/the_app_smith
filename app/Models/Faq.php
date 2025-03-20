<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Faq extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'faqable_type',
        'faqable_id',
        'question',
        'answer',
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
        'status' => 'boolean',
    ];

    /**
     * Get the parent faqable model.
     */
    public function faqable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Get the user who created the FAQ.
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_id');
    }

    /**
     * Get the user who last updated the FAQ.
     */
    public function updater(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_id');
    }

    /**
     * Scope a query to only include active FAQs.
     */
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }
}
