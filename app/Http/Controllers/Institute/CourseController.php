<?php

namespace App\Http\Controllers\Institute;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Faculty;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        // Get courses related to the authenticated institute
        $courses = Course::where('institute_id', auth()->id())->get();
        return view('institute.courses.index', compact('courses'));
    }

    public function create()
    {
        $faculties = Faculty::where('institute_id', auth()->id())->get(); // Fetch faculties associated with the institute
        return view('institute.courses.create', compact('faculties'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'faculty_id' => 'required|exists:faculties,id',
        ]);

        Course::create([
            'name' => $request->name,
            'faculty_id' => $request->faculty_id,
            'institute_id' => auth()->id(), // Associate the course with the authenticated institute
        ]);

        return redirect()->route('institute.courses.index')->with('success', 'Course created successfully.');
    }

    public function edit(Course $course)
    {
        $faculties = Faculty::where('institute_id', auth()->id())->get();
        return view('institute.courses.edit', compact('course', 'faculties'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'faculty_id' => 'required|exists:faculties,id',
        ]);

        $course->update($request->all());

        return redirect()->route('institute.courses.index')->with('success', 'Course updated successfully.');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('institute.courses.index')->with('success', 'Course deleted successfully.');
    }
}
