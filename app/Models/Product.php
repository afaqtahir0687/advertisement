<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'subcategory_id',
        'name',
        'slug',
        'short_description',
        'description',
        'price',
        'discount_price',
        'image',
        'images',
        'is_featured',
        'is_new_arrival',
        'status',
    ];

    protected $casts = [
        'images' => 'array',
        'is_featured' => 'boolean',
        'is_new_arrival' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'subcategory_id');
    }
}
