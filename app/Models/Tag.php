<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Tag extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'bg',
        'text',
        'status',
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
     * Get the blogs that are tagged with this tag.
     */
    public function blogs(): MorphToMany
    {
        return $this->morphedByMany(Blog::class, 'taggable');
    }

    /**
     * Get the user who created the tag.
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_id');
    }

    /**
     * Get the user who last updated the tag.
     */
    public function updater(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_id');
    }
}
