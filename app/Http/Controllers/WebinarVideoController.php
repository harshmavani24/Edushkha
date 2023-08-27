<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebinarVideoController extends Controller
{
    public function index()
    {
        $channelName = 'a'; // Replace with your channel name
        $token = '007eJxTYGARi1xu53qvTrH09c6GsopZUX/+fj85a6XnLsfejpm9Uy0UGJLM00yMzIxSkwxS0kzMDA0SEw3MjUzNUhMNTdLME42Tn214ldIQyMhgcOwvMyMDBIL4jAyJDAwAZBUg4A=='; // Replace with your token

        return view('webinar-video', [
            'channelName' => $channelName,
            'token' => $token,
        ]);
    }
}
