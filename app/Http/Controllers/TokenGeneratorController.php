<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AgoraIO\AgoraDynamicKey\RtcTokenBuilder;
use AgoraIO\AgoraDynamicKey\RtcRole;

class TokenGeneratorController extends Controller
{
    public function generateToken(Request $request)
    {
        $appId = 'b7f4262eb0df4610aa07256ea14f7a3c'; // Replace with your App ID
        $appCertificate = '81541d4fc65540c6b3894a1e43b111b7'; // Replace with your App Certificate
        $channelName = $request->input('channelName');
        $uid = $request->input('uid'); // Set the user ID
        $role = 1; // 1 for PUBLISHER, 2 for SUBSCRIBER
        $expirationTimeInSeconds = 3600; // Token expiration time in seconds

        $token = RtcTokenBuilder::buildTokenWithUid(
            $appId,
            $appCertificate,
            $channelName,
            $uid,
            $role,
            $expirationTimeInSeconds
        );

        return response()->json(['token' => $token]);
    }

}
