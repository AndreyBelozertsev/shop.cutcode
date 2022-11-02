<?php

namespace App\Models;

use App\Traits\Models\HasSlug;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    use HasSlug;

    protected $fillable = [
        'title',
        'price',
        'slug'
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
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
