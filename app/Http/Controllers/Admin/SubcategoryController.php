<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class SubcategoryController extends Controller
{
    public function index()
    {
        // Get only subcategories (categories with parent_id)
        $subcategories = Category::whereNotNull('parent_id')->with('parent')->latest()->get();
        return view('admin.subcategories.index', compact('subcategories'));
    }

    public function create()
    {
        // Get only parent categories (categories without parent_id)
        $parent_categories = Category::where('status', 'active')->whereNull('parent_id')->get();
        return view('admin.subcategories.create', compact('parent_categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories',
            'parent_id' => 'required|exists:categories,id',
            'status' => 'required',
        ]);

        $subcategory = new Category();
        $subcategory->name = $request->name;
        $subcategory->slug = Str::slug($request->name);
        $subcategory->status = $request->status;
        $subcategory->parent_id = $request->parent_id;
        
        if ($request->hasFile('image')) {
            $subcategory->image = $request->file('image')->store('categories', 'public');
        }

        $subcategory->save();

        return redirect()->route('admin.subcategories.index')->with('success', 'Subcategory created successfully.');
    }

    public function edit(Category $subcategory)
    {
        // Ensure we're editing a subcategory
        if (is_null($subcategory->parent_id)) {
            return redirect()->route('admin.subcategories.index')->with('error', 'This is not a subcategory.');
        }

        $parent_categories = Category::where('status', 'active')->whereNull('parent_id')->where('id', '!=', $subcategory->id)->get();
        return view('admin.subcategories.edit', compact('subcategory', 'parent_categories'));
    }

    public function update(Request $request, Category $subcategory)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,' . $subcategory->id,
            'parent_id' => 'required|exists:categories,id',
            'status' => 'required',
        ]);

        $subcategory->name = $request->name;
        $subcategory->slug = Str::slug($request->name);
        $subcategory->status = $request->status;
        $subcategory->parent_id = $request->parent_id;

        if ($request->hasFile('image')) {
            if ($subcategory->image) {
                Storage::disk('public')->delete($subcategory->image);
            }
            $subcategory->image = $request->file('image')->store('categories', 'public');
        }

        $subcategory->save();

        return redirect()->route('admin.subcategories.index')->with('success', 'Subcategory updated successfully.');
    }

    public function destroy(Category $subcategory)
    {
        // Ensure we're deleting a subcategory
        if (is_null($subcategory->parent_id)) {
            return redirect()->route('admin.subcategories.index')->with('error', 'This is not a subcategory.');
        }

        if ($subcategory->image) {
            Storage::disk('public')->delete($subcategory->image);
        }
        if ($subcategory->hover_image) {
            Storage::disk('public')->delete($subcategory->hover_image);
        }
        $subcategory->delete();

        return redirect()->route('admin.subcategories.index')->with('success', 'Subcategory deleted successfully.');
    }
}
