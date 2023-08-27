@extends('layouts.app')

@section('content')
<div>
    <!-- Add a button to start the video call -->
    <button id="join">Join Video Call</button>
    <!-- Add a button to leave the video call -->
    <button id="leave">Leave Video Call</button>

    <!-- Container for the local video -->
    <div id="local-player-container">
        <div id="local-player"></div>
    </div>

    <!-- Container for the remote video -->
    <div id="remote-player-container"></div>
</div>

<script src="https://cdn.agora.io/sdk/release/AgoraRTC_N-4.18.2.js"></script>
<script>
    let options = {
        appId: 'b7f4262eb0df4610aa07256ea14f7a3c', // Replace with your App ID
        channel: 'a', // Replace with your channel name
        token: '007eJxTYDBcMNMl4+55g/tbCpktXm90Xh+W25g08/068wpJjRdC9isVGJLM00yMzIxSkwxS0kzMDA0SEw3MjUzNUhMNTdLME42Tfda8SmkIZGTY5tvNwsgAgSA+I0MiAwMA9bEebg==', // Replace with your token
        uid: 'guest_' + Date.now() + '_' + Math.floor(Math.random() * 10000)
    };
    let agoraEngine;
    let localPlayerContainer;
    let remotePlayerContainer;

    async function startBasicCall() {
        agoraEngine = AgoraRTC.createClient({ mode: "rtc", codec: "vp9" });
        localPlayerContainer = document.getElementById("local-player-container");
        remotePlayerContainer = document.getElementById("remote-player-container");

        document.getElementById("join").addEventListener("click", async () => {
            try {
                await agoraEngine.join(options.appId, options.channel, options.token, options.uid);
                const localAudioTrack = await AgoraRTC.createMicrophoneAudioTrack();
                const localVideoTrack = await AgoraRTC.createCameraVideoTrack();

                const localPlayer = document.createElement("div");
                localPlayer.id = "local-player";
                localPlayerContainer.appendChild(localPlayer);
                localVideoTrack.play(localPlayer);

                await agoraEngine.publish([localAudioTrack, localVideoTrack]);
            } catch (error) {
                console.error("Error joining video call:", error);
            }
        });

        document.getElementById("leave").addEventListener("click", async () => {
            try {
                await agoraEngine.leave();
                localPlayerContainer.innerHTML = "";
                remotePlayerContainer.innerHTML = "";
            } catch (error) {
                console.error("Error leaving video call:", error);
            }
        });

        agoraEngine.on("user-published", async (user, mediaType) => {
            if (mediaType === "video") {
                const remoteVideoTrack = user.videoTrack;
                const remotePlayer = document.createElement("div");
                remotePlayer.id = `remote-player-${user.uid}`;
                remotePlayerContainer.appendChild(remotePlayer);
                remoteVideoTrack.play(remotePlayer);
            }
        });

        agoraEngine.on("user-unpublished", user => {
            if (user.videoTrack) {
                const remoteVideoPlayer = document.getElementById(`remote-player-${user.uid}`);
                if (remoteVideoPlayer) {
                    remoteVideoPlayer.innerHTML = "";
                }
            }
        });
    }

    startBasicCall();
</script>
@endsection
