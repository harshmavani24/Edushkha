<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Helpers\Helpers;
use App\Models\Conference;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function createConference()
    {
        // Generate a random conference code
        $conferenceCode = Helpers::generateConferenceCode();

        // Create a new conference record
        $conference = new Conference([
            'code' => $conferenceCode,
            // Other fields
        ]);

        // Save the conference record
        $conference->save();

        return $conference;
    }
}

class ConferenceController extends Controller
{
    public function create(Request $request)
    {
        // Create a new conference using the helper method
        $conference = $this->createConference();

        // Redirect to the conference show page
        return redirect()->route('conferences.show', ['conference' => $conference]);
    }

    // ...
}
