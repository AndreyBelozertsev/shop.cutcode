<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function raiting()
    {
        return $this->hasMany(ProductRaiting::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status',1);
    }

    public function scopePopular($query)
    {
        return $query->orderBy('raiting.vote', 'asc');
    }
}
