<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    public function index()
    {
        $admissions = Admission::all();
        return view('admin.admissions.index', compact('admissions'));
    }

    public function publish(Request $request)
    {
        // Logic to publish admissions
        // This could involve setting a status or other necessary actions
        return redirect()->route('admin.admissions.index')->with('success', 'Admissions published successfully.');
    }

    public function viewApplications()
    {
        // Logic to view applications
        return view('admin.admissions.applications');
    }
}
