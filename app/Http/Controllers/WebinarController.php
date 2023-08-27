<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Webinar;

class WebinarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all webinars from the database
        $webinars = Webinar::all();

        // Pass the webinars to the view and display them
        return view('webinars.index', ['webinars' => $webinars]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return the view for creating a new webinar
        return view('webinars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the input from the form
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            // Add more validation rules for other fields
        ]);

        // Create a new webinar using the validated data
        $webinar = Webinar::create($validatedData);

        // Redirect to the index page with a success message
        return redirect()->route('webinars.index')->with('success', 'Webinar created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find the webinar by its ID
        $webinar = Webinar::findOrFail($id);

        // Pass the webinar to the view and display it
        return view('webinars.show', ['webinar' => $webinar]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Find the webinar by its ID
        $webinar = Webinar::findOrFail($id);

        // Return the view for editing the webinar
        return view('webinars.edit', ['webinar' => $webinar]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the input from the form
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            // Add more validation rules for other fields
        ]);

        // Find the webinar by its ID
        $webinar = Webinar::findOrFail($id);

        // Update the webinar using the validated data
        $webinar->update($validatedData);

        // Redirect to the index page with a success message
        return redirect()->route('webinars.index')->with('success', 'Webinar updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the webinar by its ID
        $webinar = Webinar::findOrFail($id);

        // Delete the webinar
        $webinar->delete();

        // Redirect to the index page with a success message
        return redirect()->route('webinars.index')->with('success', 'Webinar deleted successfully');
    }
}
