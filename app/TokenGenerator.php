<?php
use AgoraIO\AgoraDynamicKey\RtcTokenBuilder;
use AgoraIO\AgoraDynamicKey\RtcRole;

$appId = 'b7f4262eb0df4610aa07256ea14f7a3c';
$primaryCertificate = '81541d4fc65540c6b3894a1e43b111b7';
$tempToken = '007eJxTYFiyeBXjlGNvtWf++nZhuWDIo2Pi8p0xc54pHPTXjX5jla6qwJBknmZiZGaUmmSQkmZiZmiQmGhgbmRqlppoaJJmnmicvGn3q5SGQEYGLmdPJkYGRgYWIAbxmcAkM5hkAZOsDBmJRcUZDAwAKagjLw==';

$channelName = $_GET['channel']; // Get channel name from query parameter
$uid = $_GET['uid']; // Get user ID from query parameter

$role = RtcRole::PUBLISHER; // Change role if needed
$expirationTimeInSeconds = 3600; // Token expiration time in seconds

$token = RtcTokenBuilder::buildTokenWithUid(
    $appId,
    $primaryCertificate,
    $channelName,
    $uid,
    $role,
    $expirationTimeInSeconds
);

$response = ['rtcToken' => $token];
header('Content-Type: application/json');
echo json_encode($response);
?>
