<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'restaurant_name', 'price', 'ingredients', 'description', 'cover_image', 'is_avaible'];

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class);
    }

    public function restaurants(): HasMany
    {
        return $this->hasMany(Restaurant::class);
    }



}
