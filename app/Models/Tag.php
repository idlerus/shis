<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['name', 'product_id'];

    /**
     * Many to one relation to products
     *
     * @return BelongsToMany
     */
    public function Products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}
