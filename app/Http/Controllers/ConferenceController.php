// app/Http/Controllers/ConferenceController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ConferenceController extends Controller
{
    public function create(Request $request)
    {
        // Generate a random conference code
        $conferenceCode = Str::random(8);

        // Perform any other conference creation logic here
        
        return response()->json(['conference_code' => $conferenceCode], 201);
    }
}
