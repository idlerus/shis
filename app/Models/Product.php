<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['name', 'shortDesc', 'fullDesc', 'brand', 'country', 'category_id', 'published'];


    /**
     * Many to one relation to products
     *
     * @return BelongsTo
     */
    public function Category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * One to many relation to ratings
     *
     * @return HasMany
     */
    public function Ratings(): HasMany
    {
        return $this->hasMany(Rating::class);
    }

    /**
     * One to many relation to comments
     *
     * @return HasMany
     */
    public function Comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * One to many relation to tags
     *
     * @return BelongsToMany
     */
    public function Tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * Get rating average
     *
     * @return float
     */
    public function getRatingAvg(): float
    {
        return $this->Ratings()->average('rating') ? : 0;
    }
}
