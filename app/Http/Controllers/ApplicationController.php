<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Products; // Use singular form for the model
use App\Models\Order;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Application::where('is_deleted', false);

        if ($search) {
            $query->where('name', 'LIKE', "%$search%");
        }

        {
            $application = $query->paginate(10);

            return view('applications', compact('application'));
        }
        
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adopt_form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input fields
        $validated= $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:application,email'],
            'address' => ['required', 'string', 'max:255'],
            'reason' => ['required', 'string', 'max:500'],
            'due_date' => ['nullable', 'date'],
            'status' => ['nullable', 'in:pending,completed'],
        ]);

        // Default status to 'pending' if not provided
        $validated['status'] = $validated['status'] ?? 'pending';

        $application = Application::create($validated);

        if ($application) {
            return redirect()->route('applications')->with('message', 'Application submitted successfully!');
        } else {
            return redirect()->route('applications')->with('message', 'Unable to submit application.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $application_id)
    {
        $application = Application::find($application_id);

        if (!$application || $application->is_deleted) {
            return redirect()->route('application.edit')->with('message', 'Application not found!');
        }

        return view('adopt_form', compact('application'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $application_id)
    {
        $application = Application::find($application_id);

        if (!$application || $application->is_deleted) {
            return redirect()->route('application.update')->with('message', 'Application not found!');
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:application,email,' . $application_id],
            'address' => ['required', 'string', 'max:255'],
            'reason' => ['required', 'string', 'max:500'],
            'due_date' => ['nullable', 'date'],
            'priority' => ['nullable', 'in:low,medium,high'],
            'status' => ['nullable', 'in:pending,completed'],
        ]);
        
        // Keep the current status if not provided in the request
        $validated['status'] = $validated['status'] ?? $application->status;
        
        // Check if the due_date has passed and update the status accordingly
        if (isset($validated['due_date']) && strtotime($validated['due_date']) < timestamp()) {
            $validated['status'] = 'completed';
        }
        
        $updated = $application->update($validated);
        
        if ($updated) {
            return redirect()->route('applications')->with('message', 'Application updated successfully!');
        } else {
            return redirect()->route('applications')->with('message', 'Unable to update application.');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($application_id)
    {
        $application = Application::find($application_id);

        if (!$application || $application->is_deleted) {
            return redirect()->route('applications')->with('message', 'Application not found!');
        }

        $application->update(['is_deleted' => true]);

        return redirect()->route('applications')->with('message', 'Application deleted successfully!');
    }

    public function applications()
    {
        $application=Application::all();
        return view('applications', compact('application'));
    }

}
