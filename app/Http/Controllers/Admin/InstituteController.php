<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Institute;
use Illuminate\Http\Request;

class InstituteController extends Controller
{
    public function index()
    {
        $institutes = Institute::all();
        return view('admin.institutes.index', compact('institutes'));
    }

    public function create()
    {
        return view('admin.institutes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        Institute::create($request->all());

        return redirect()->route('admin.institutes.index')->with('success', 'Institute created successfully.');
    }

    public function edit(Institute $institute)
    {
        return view('admin.institutes.edit', compact('institute'));
    }

    public function update(Request $request, Institute $institute)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        $institute->update($request->all());

        return redirect()->route('admin.institutes.index')->with('success', 'Institute updated successfully.');
    }

    public function destroy(Institute $institute)
    {
        $institute->delete();
        return redirect()->route('admin.institutes.index')->with('success', 'Institute deleted successfully.');
    }
}
