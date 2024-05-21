<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function index()
    {
        $records = Setting::all();
        return view('Dashboard.Setting.index', compact('records'));
    }

    public function edit($id)
    {
        $record = Setting::findOrFail($id);
        return view('Dashboard.Setting.edit', compact('record'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'notification_settings_text' => 'required|string|max:255',
            'about_app' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'facebook_link' => 'nullable|string|max:255',
            'twitter_link' => 'nullable|string|max:255',
            'instagram_link' => 'nullable|string|max:255',
        ]);

        $setting = Setting::findOrFail($id);
        $setting->update($validatedData);
        return redirect('settings')->with('success', 'Setting updated successfully.');
    }

}
