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
        'sku',
        'short_description',
        'description',
        'size_guide',
        'additional_info',
        'price',
        'discount_price',
        'quantities',
        'allow_custom_quantity',
        'flexible_rate',
        'urgent_rate',
        'delivery_days',
        'production_days',
        'flexible_production_days',
        'urgent_production_days',
        'image',
        'images',
        'materials',
        'sizes',
        'side_1_colors',
        'sides_options',
        'lamination_types',
        'die_cutting_options',
        'is_featured',
        'is_new_arrival',
        'is_wishlist',
        'status',
    ];

    protected $casts = [
        'images' => 'array',
        'quantities' => 'array',
        'materials' => 'array',
        'sizes' => 'array',
        'side_1_colors' => 'array',
        'sides_options' => 'array',
        'lamination_types' => 'array',
        'die_cutting_options' => 'array',
        'is_featured' => 'boolean',
        'is_new_arrival' => 'boolean',
        'allow_custom_quantity' => 'boolean',
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
