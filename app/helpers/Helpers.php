namespace App\Helpers;

if (!function_exists('generateConferenceCode')) {
    function generateConferenceCode($length = 6)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $code = '';

        for ($i = 0; $i < $length; $i++) {
            $code .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $code;
    }
}
