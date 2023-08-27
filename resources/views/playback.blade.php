
@extends('layouts.app')

@section('content')
<h1>Playback: {{ $recording->event->title }}</h1>
<div id="agora-playback-view"></div>

<script src="{{ asset('js/AgoraRTC-4.18.2.js') }}"></script>
<script>
    // Initialize Agora Playback SDK
    var agoraAppId = 'abab5a71ae804f5d893ce71e86090a33'; // Your Agora App ID
    var recordingUuid = '{{ $recording->uuid }}'; // UUID from the recording

    var player = AgoraRTC.createRtcPlayer();

    // Initialize the player
    player.init({
        mode: 'live',
        codec: 'h264',
        playbackUrl: 'YOUR_PLAYBACK_URL', // Construct the playback URL
        container: 'agora-playback-view'
    }, function () {
        console.log('AgoraRTC player initialized');
        player.play(); // Start playback
    }, function (err) {
        console.log('AgoraRTC player initialization failed', err);
    });
</script>
@endsection
