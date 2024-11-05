<?php

namespace App\Http\Controllers\Institute;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        // Get applications related to the authenticated institute
        $applications = Application::where('institute_id', auth()->id())->get();
        return view('institute.applications.index', compact('applications'));
    }

    public function show(Application $application)
    {
        return view('institute.applications.show', compact('application'));
    }

    public function updateStatus(Request $request, Application $application)
    {
        $request->validate([
            'status' => 'required|in:accepted,rejected,pending',
        ]);

        $application->update(['status' => $request->status]);

        return redirect()->route('institute.applications.index')->with('success', 'Application status updated successfully.');
    }
}
