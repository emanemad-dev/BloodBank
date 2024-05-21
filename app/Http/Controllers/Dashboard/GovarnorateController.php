<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Governorate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class GovarnorateController extends Controller
{
    public function index()
    {
        $records = Governorate::all();
        return view('Dashboard.Governorate.index', compact('records'));
    }

    public function create()
    {
        return view('Dashboard.Governorate.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        Governorate::create($request->all());
        return redirect('govarnorates')->with('success', 'Governorate created successfully.');
    }

    public function edit( $id)
    {
        $record = Governorate::findOrFail($id);
        return view('Dashboard.Governorate.edit', compact('record'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $governorate = Governorate::findOrFail($id);
        $governorate->update($validatedData);
        return redirect('govarnorates')->with('success', 'Governorate updated successfully.');
    }

    public function destroy($id)
    {
        $governorate = Governorate::findOrFail($id);
        $governorate->delete();
        return redirect('govarnorates')->with('success', 'Governorate deleted successfully.');
    }
}
