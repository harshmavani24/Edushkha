import AgoraRTC from 'agora-rtc-sdk-ng';

const options = {
    appId: 'b7f4262eb0df4610aa07256ea14f7a3c',
    channel: 'harsh', // Change to your desired channel name
    uid: Math.floor(Math.random() * 10000),
    serverUrl: '/generate-token',
};

const localPlayerContainer = document.getElementById('local-player-container');
const remotePlayerContainer = document.getElementById('remote-player-container');
const agoraEngine = AgoraRTC.createClient({ mode: 'rtc', codec: 'vp9' });

async function startBasicCall() {
    document.getElementById('join').addEventListener('click', async () => {
        const response = await fetch(`${options.serverUrl}?channelName=${options.channel}&uid=${options.uid}`, {
            method: 'POST',
        });
        const { token } = await response.json();

        await agoraEngine.join(options.appId, options.channel, token, options.uid);
        const localAudioTrack = await AgoraRTC.createMicrophoneAudioTrack();
        const localVideoTrack = await AgoraRTC.createCameraVideoTrack();

        localVideoTrack.play(localPlayerContainer);
        await agoraEngine.publish([localAudioTrack, localVideoTrack]);
    });

    document.getElementById('leave').addEventListener('click', async () => {
        await agoraEngine.leave();
        localPlayerContainer.innerHTML = '';
        remotePlayerContainer.innerHTML = '';
    });

    agoraEngine.on('user-published', async (user, mediaType) => {
        if (mediaType === 'video') {
            const remoteVideoTrack = user.videoTrack;
            const remotePlayer = document.createElement('div');
            remotePlayerContainer.appendChild(remotePlayer);
            remoteVideoTrack.play(remotePlayer);
        }
    });

    agoraEngine.on('user-unpublished', user => {
        if (user.videoTrack) {
            const remoteVideoPlayer = remotePlayerContainer.querySelector(`[data-uid="${user.uid}"]`);
            if (remoteVideoPlayer) {
                remoteVideoPlayer.innerHTML = '';
            }
        }
    });
}

startBasicCall();
