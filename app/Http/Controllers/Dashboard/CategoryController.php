<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class categoryController extends Controller
{
    public function index()
    {
        $records = Category::all();
        return view('Dashboard.category.index', compact('records'));
    }

    public function create()
    {
        return view('Dashboard.category.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create($validatedData);
        return redirect('categories')->with('success', 'category created successfully.');
    }

    public function edit($id)
    {
        $record = Category::findOrFail($id);
        return view('Dashboard.category.edit', compact('record'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = Category::findOrFail($id);
        $category->update($validatedData);
        return redirect('categories')->with('success', 'category updated successfully.');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect('categories')->with('success', 'category deleted successfully.');
    }
}
