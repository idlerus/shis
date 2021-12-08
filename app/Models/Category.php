<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['name'];

    /**
     * One to many relation to products
     *
     * @return HasMany
     */
    public function Products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Chceck if category has any products assigned
     *
     * @return bool
     */
    public function HasAnyProducts(): bool
    {
        return ($this->Products()->count() > 0);
    }

    /**
     * Tags for all products in category
     *
     * @return HasManyThrough
     */
    public function Tags()
    {
        return $this->hasManyThrough(Product::class, Tag::class);
    }
}
