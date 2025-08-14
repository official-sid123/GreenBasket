<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'description',
        'image_url',
        'category',
        'is_featured'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // Add to the Product model
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
