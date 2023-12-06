<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'user_id', 'cover_image', 'name', 'address', 'vat'];

    public function typologies(): BelongsToMany
    {
        return $this->belongsToMany(Typology::class);
    }
}