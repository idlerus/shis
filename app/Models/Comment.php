<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['comment', 'user_id', 'product_id'];

    /**
     * Many to one relation to products
     *
     * @return BelongsTo
     */
    public function Product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Many to one relation to user
     *
     * @return BelongsTo
     */
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
