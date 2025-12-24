<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'status',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function subcategories()
    {
        return $this->hasMany(SubCategory::class);
    }

    // Helper method to get all products including from subcategories
    public function getAllProducts()
    {
        $productIds = $this->products()->pluck('id');
        
        // Get products from all subcategories
        foreach ($this->subcategories as $subcategory) {
            $productIds = $productIds->merge($subcategory->products()->pluck('id'));
        }
        
        return Product::whereIn('id', $productIds)->where('status', 'active')->get();
    }

    // Get full category path for breadcrumbs (simply returns itself now as it's top level)
    public function getFullPath()
    {
        return collect([$this]);
    }
}
