<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'restaurant_name', 'price', 'ingredients', 'description', 'cover_image', 'is_avaible'];

}
