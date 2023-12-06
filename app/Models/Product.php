<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Product extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'restaurant_name', 'price', 'ingredients', 'description', 'cover_image', 'is_avaible'];

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class);
    }


}
