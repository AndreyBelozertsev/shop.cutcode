<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'title',
        'slug',
        'is_home_page'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function scopeActive($query)
    {
        return $query->where('status',1);
    }

    public function scopeHomePage($query)
    {
        return $query->where('is_home_page',1);
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
