<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::where('status', 'active')->get();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:products',
            'category_id' => 'required',
            'subcategory_id' => 'nullable|exists:sub_categories,id',
            'price' => 'required|numeric',
            'status' => 'required',
            'image' => 'required|image',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->slug = Str::slug($request->name);
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        $product->size_guide = $request->size_guide;
        $product->additional_info = $request->additional_info;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $product->delivery_days = $request->delivery_days ?? 1;
        $product->production_days = $request->production_days ?? 3;
        $product->flexible_rate = $request->flexible_rate;
        $product->urgent_rate = $request->urgent_rate;
        $product->flexible_production_days = $request->flexible_production_days ?? 5;
        $product->urgent_production_days = $request->urgent_production_days ?? 1;
        
        $product->materials = $request->materials ? array_map('trim', explode(',', $request->materials)) : null;
        $product->sizes = $request->sizes ? array_map('trim', explode(',', $request->sizes)) : null;
        $product->side_1_colors = $request->side_1_colors ? array_map('trim', explode(',', $request->side_1_colors)) : null;
        $product->sides_options = $request->sides_options ? array_map('trim', explode(',', $request->sides_options)) : null;
        $product->lamination_types = $request->lamination_types ? array_map('trim', explode(',', $request->lamination_types)) : null;
        $product->die_cutting_options = $request->die_cutting_options ? array_map('trim', explode(',', $request->die_cutting_options)) : null;

        $product->status = $request->status;
        $product->is_featured = $request->has('is_featured');
        $product->is_new_arrival = $request->has('is_new_arrival');

        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('products', 'public');
        }

        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $file) {
                $images[] = $file->store('products/gallery', 'public');
            }
            $product->images = $images;
        }

        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        $categories = Category::where('status', 'active')->get();
        $subcategories = \App\Models\SubCategory::where('category_id', $product->category_id)->where('status', 'active')->get();
        return view('admin.products.edit', compact('product', 'categories', 'subcategories'));
    }

    public function update(Request $request, Product $product)
    {
         $request->validate([
            'name' => 'required|unique:products,name,' . $product->id,
            'category_id' => 'required',
            'subcategory_id' => 'nullable|exists:sub_categories,id',
            'price' => 'required|numeric',
            'status' => 'required',
        ]);

        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->slug = Str::slug($request->name);
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        $product->size_guide = $request->size_guide;
        $product->additional_info = $request->additional_info;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $product->delivery_days = $request->delivery_days ?? 1;
        $product->production_days = $request->production_days ?? 3;
        $product->flexible_rate = $request->flexible_rate;
        $product->urgent_rate = $request->urgent_rate;
        $product->flexible_production_days = $request->flexible_production_days ?? 5;
        $product->urgent_production_days = $request->urgent_production_days ?? 1;

        $product->materials = $request->materials ? array_map('trim', explode(',', $request->materials)) : null;
        $product->sizes = $request->sizes ? array_map('trim', explode(',', $request->sizes)) : null;
        $product->side_1_colors = $request->side_1_colors ? array_map('trim', explode(',', $request->side_1_colors)) : null;
        $product->sides_options = $request->sides_options ? array_map('trim', explode(',', $request->sides_options)) : null;
        $product->lamination_types = $request->lamination_types ? array_map('trim', explode(',', $request->lamination_types)) : null;
        $product->die_cutting_options = $request->die_cutting_options ? array_map('trim', explode(',', $request->die_cutting_options)) : null;

        $product->status = $request->status;
        $product->is_featured = $request->has('is_featured');
        $product->is_new_arrival = $request->has('is_new_arrival');

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $product->image = $request->file('image')->store('products', 'public');
        }

        // Handle gallery images update logic (simplified for now, usually needs more complex logic to add/remove specific images)
        if ($request->hasFile('images')) {
             $images = $product->images ?? [];
             foreach ($request->file('images') as $file) {
                $images[] = $file->store('products/gallery', 'public');
            }
            $product->images = $images;
        }

        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        // Also delete gallery images...

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
}
