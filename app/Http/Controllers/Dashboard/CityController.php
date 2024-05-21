<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    public function index()
    {
        $records = City::with('governorate')->get();
        return view('Dashboard.City.index', compact('records'));
    }

    public function create()
    {
        return view('Dashboard.City.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'governorate_id' => 'required|exists:governorates,id',
        ]);
        City::create($request->all());
        return redirect('cities')->with('success', 'City created successfully.');
    }

    public function edit($id)
    {
        $record = City::findOrFail($id);
        return view('Dashboard.City.edit', compact('record'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'governorate_id' => 'required|exists:governorates,id',
        ]);

        $City = City::findOrFail($id);
        $City->update($validatedData);
        return redirect('cities')->with('success', 'City updated successfully.');
    }

    public function destroy($id)
    {
        $City = City::findOrFail($id);
        $City->delete();
        return redirect('cities')->with('success', 'City deleted successfully.');
    }
}
