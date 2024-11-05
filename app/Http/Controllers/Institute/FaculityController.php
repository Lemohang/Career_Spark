<?php

namespace App\Http\Controllers\Institute;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    public function index()
    {
        // Get faculties related to the authenticated institute
        $faculties = Faculty::where('institute_id', auth()->id())->get();
        return view('institute.faculties.index', compact('faculties'));
    }

    public function create()
    {
        return view('institute.faculties.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Faculty::create([
            'name' => $request->name,
            'institute_id' => auth()->id(), // Associate faculty with the authenticated institute
        ]);

        return redirect()->route('institute.faculties.index')->with('success', 'Faculty created successfully.');
    }

    public function edit(Faculty $faculty)
    {
        return view('institute.faculties.edit', compact('faculty'));
    }

    public function update(Request $request, Faculty $faculty)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $faculty->update($request->all());

        return redirect()->route('institute.faculties.index')->with('success', 'Faculty updated successfully.');
    }

    public function destroy(Faculty $faculty)
    {
        $faculty->delete();
        return redirect()->route('institute.faculties.index')->with('success', 'Faculty deleted successfully.');
    }
}
