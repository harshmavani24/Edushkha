@extends('layouts.app')

@section('content')
<div>
    <!-- Add a button to start the video call -->
    <button id="join">Join Video Call</button>
    <!-- Add a button to leave the video call -->
    <button id="leave">Leave Video Call</button>

    <!-- Container for the local video -->
    <div id="local-player-container"></div>

    <!-- Container for the remote video -->
    <div id="remote-player-container"></div>
</div>

<script>
    // Use Blade syntax to escape PHP variables
    let options = {
        appId: '{{ env("b7f4262eb0df4610aa07256ea14f7a3c") }}', // Use the environment variable
        channel: '{{ $a }}', // Pass the channel name as required
        token: '{{ $007eJxTYGARi1xu53qvTrH09c6GsopZUX/+fj85a6XnLsfejpm9Uy0UGJLM00yMzIxSkwxS0kzMDA0SEw3MjUzNUhMNTdLME42Tn214ldIQyMhgcOwvMyMDBIL4jAyJDAwAZBUg4A== }}', // Pass the token as required
        uid: {{ auth()->user()->id }} // Adjust the user ID accordingly
    };

    // Create an instance of the Agora Engine
    const agoraEngine = AgoraRTC.createClient({ mode: "rtc", codec: "vp9" });

    // Dynamically create a container in the form of a DIV element to play the remote video track.
    const remotePlayerContainer = document.createElement("div");

    // Dynamically create a container in the form of a DIV element to play the local video track.
    const localPlayerContainer = document.createElement('div');

    // Specify the ID of the DIV container. You can use the uid of the local user.
    localPlayerContainer.id = options.uid;

    // Set the textContent property of the local video container to the local user id.
    localPlayerContainer.textContent = "Local user " + options.uid;

    // Set the local video container size.
    localPlayerContainer.style.width = "640px";
    localPlayerContainer.style.height = "480px";
    localPlayerContainer.style.padding = "15px 5px 5px 5px";

    // Set the remote video container size.
    remotePlayerContainer.style.width = "640px";
    remotePlayerContainer.style.height = "480px";
    remotePlayerContainer.style.padding = "15px 5px 5px 5px";

    // ... Rest of your JavaScript code ...
</script>
@endsection
