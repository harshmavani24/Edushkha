@extends('layouts.app')

@section('content')
<h1>Welcome to the Webinar: {{ $event->title }}</h1>
<div id="agora-video-view"></div>

<script src="{{ asset('/run/media/d3vil/VMWARE/Agora_Web_SDK_v4_18_2_FULL/Agora_Web_SDK_FULL') }}"></script>

<script>
    // Initialize Agora SDK
    var agoraAppId = 'abab5a71ae804f5d893ce71e86090a33'; // Your Agora App ID
    var channelName = '{{ $event->title }}';

    var client = AgoraRTC.createClient({ mode: 'live', codec: 'h264' });

    client.init(agoraAppId, function () {
        console.log('AgoraRTC client initialized');
    }, function (err) {
        console.log('AgoraRTC client initialization failed', err);
    });

    // Join the channel
    client.join(null, channelName, null, function(uid) {
        console.log('User ' + uid + ' join channel successfully');
        var localStream = AgoraRTC.createStream({
            streamID: uid,
            audio: true,
            video: true,
            screen: false
        });

        localStream.init(function() {
            localStream.play('agora-video-view');
            client.publish(localStream, function(err) {
                console.log('Publish local stream error: ' + err);
            });
        }, function(err) {
            console.log('getUserMedia failed', err);
        });
    }, function(err) {
        console.log('Join channel failed', err);
    });

    // Handling leaving the channel
    window.onunload = window.onbeforeunload = function() {
        client.leave(function() {
            console.log('Client successfully left channel');
        }, function(err) {
            console.log('Leave channel failed', err);
        });
    };
</script>
@endsection


