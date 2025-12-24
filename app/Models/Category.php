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

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // Helper method to get all products including from subcategories
    public function getAllProducts()
    {
        $productIds = $this->products()->pluck('id');
        
        // Get products from all subcategories recursively
        foreach ($this->children as $child) {
            $productIds = $productIds->merge($child->getAllProducts()->pluck('id'));
        }
        
        return Product::whereIn('id', $productIds)->where('status', 'active')->get();
    }

    // Check if category is a parent (has children)
    public function isParent()
    {
        return $this->children()->count() > 0;
    }

    // Check if category is a subcategory (has parent)
    public function isSubcategory()
    {
        return !is_null($this->parent_id);
    }

    // Get full category path for breadcrumbs
    public function getFullPath()
    {
        $path = collect([$this]);
        $parent = $this->parent;
        
        while ($parent) {
            $path->prepend($parent);
            $parent = $parent->parent;
        }
        
        return $path;
    }
}
