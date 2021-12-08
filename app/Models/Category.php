<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
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
     * Check if category has any products assigned
     *
     * @return bool
     */
    public function HasAnyProducts(): bool
    {
        return ($this->Products()->count() > 0);
    }

    /**
     * Returns tags associated with products in category
     *
     * @return Collection<Tag>
     */
    public function Tags()
    {
        $tags = [];
        $products = $this->Products()->get();
        foreach($products as $product)
        {
            $tags = $product->Tags();
        }
        return $tags->get();
    }
}
