<?php

// app/Http/Controllers/EventController.php

use App\Models\Webinar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date_time' => 'required|date',
            // Add more validation rules as needed
        ]);

        if ($validator->fails()) {
            // Handle validation errors
        }

        // Create a new webinar
        Webinar::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'date_time' => $request->input('date_time'),
        ]);

        // Redirect or respond
    }
}
