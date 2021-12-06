<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'shortDesc', 'fullDesc', 'brand', 'country', 'category_id'];


    /**
     * Many to one relation to products
     *
     * @return BelongsTo
     */
    public function Category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
