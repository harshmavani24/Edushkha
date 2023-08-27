
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class AnalyticsController extends Controller
{
    public function show($eventId)
    {
        $event = Event::findOrFail($eventId);

        return view('analytics.show', compact('event'));
    }
}


