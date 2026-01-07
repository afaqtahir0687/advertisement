<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->get();
        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
            'status' => 'required',
        ]);

        $slider = new Slider();
        if ($request->hasFile('image')) {
            $slider->image = $request->file('image')->store('sliders', 'public');
        }
        $slider->title = $request->title;
        $slider->subtitle = $request->subtitle;
        $slider->offer_text = $request->offer_text;
        $slider->link = $request->link;
        $slider->status = $request->status;
        $slider->save();

        return redirect()->route('admin.sliders.index')->with('success', 'Slider created successfully.');
    }

    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'status' => 'required',
        ]);

        if ($request->hasFile('image')) {
            if ($slider->image) {
                Storage::disk('public')->delete($slider->image);
            }
            $slider->image = $request->file('image')->store('sliders', 'public');
        }

        $slider->title = $request->title;
        $slider->subtitle = $request->subtitle;
        $slider->offer_text = $request->offer_text;
        $slider->link = $request->link;
        $slider->status = $request->status;
        $slider->save();

        return redirect()->route('admin.sliders.index')->with('success', 'Slider updated successfully.');
    }

    public function destroy(Slider $slider)
    {
        if ($slider->image) {
            Storage::disk('public')->delete($slider->image);
        }
        $slider->delete();

        return redirect()->route('admin.sliders.index')->with('success', 'Slider deleted successfully.');
    }
}
