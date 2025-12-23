<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.settings.index');
    }

    public function update(Request $request)
    {
        // Example: Settings could be just key-value pairs updated in bulk
        // For simplicity, let's assume we are saving specific keys
        $data = $request->except('_token');

        foreach ($data as $key => $value) {
            $setting = Setting::firstOrNew(['key' => $key]);
            $setting->value = $value;
            $setting->save();
        }

        return redirect()->back()->with('success', 'Settings updated successfully.');
    }
}
