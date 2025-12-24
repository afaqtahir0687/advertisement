<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class SubcategoryController extends Controller
{
    public function index()
    {
        $subcategories = SubCategory::with('category')->latest()->get();
        return view('admin.subcategories.index', compact('subcategories'));
    }

    public function create()
    {
        $parent_categories = Category::where('status', 'active')->get();
        return view('admin.subcategories.create', compact('parent_categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:sub_categories',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required',
        ]);

        $subcategory = new SubCategory();
        $subcategory->name = $request->name;
        $subcategory->slug = Str::slug($request->name);
        $subcategory->status = $request->status;
        $subcategory->category_id = $request->category_id;
        
        if ($request->hasFile('image')) {
            $subcategory->image = $request->file('image')->store('subcategories', 'public');
        }

        $subcategory->save();

        return redirect()->route('admin.subcategories.index')->with('success', 'Subcategory created successfully.');
    }

    public function edit(SubCategory $subcategory)
    {
        $parent_categories = Category::where('status', 'active')->get();
        return view('admin.subcategories.edit', compact('subcategory', 'parent_categories'));
    }

    public function update(Request $request, SubCategory $subcategory)
    {
        $request->validate([
            'name' => 'required|unique:sub_categories,name,' . $subcategory->id,
            'category_id' => 'required|exists:categories,id',
            'status' => 'required',
        ]);

        $subcategory->name = $request->name;
        $subcategory->slug = Str::slug($request->name);
        $subcategory->status = $request->status;
        $subcategory->category_id = $request->category_id;

        if ($request->hasFile('image')) {
            if ($subcategory->image) {
                Storage::disk('public')->delete($subcategory->image);
            }
            $subcategory->image = $request->file('image')->store('subcategories', 'public');
        }

        $subcategory->save();

        return redirect()->route('admin.subcategories.index')->with('success', 'Subcategory updated successfully.');
    }

    public function destroy(SubCategory $subcategory)
    {
        if ($subcategory->image) {
            Storage::disk('public')->delete($subcategory->image);
        }
        $subcategory->delete();

        return redirect()->route('admin.subcategories.index')->with('success', 'Subcategory deleted successfully.');
    }
}
