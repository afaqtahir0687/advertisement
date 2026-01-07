<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'image',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'subcategory_id');
    }

    public function subcategories()
    {
        return $this->hasMany(SubCategory::class, 'category_id')->where('id', null);
    }

    public function getAllProducts()
    {
        return $this->products()->where('status', 'active')->get();
    }

    public function getFullPath()
    {
        return collect([$this->category, $this]);
    }
}
