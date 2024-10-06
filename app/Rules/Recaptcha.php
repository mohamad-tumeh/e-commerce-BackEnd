<?php

namespace App\Rules;

use GuzzleHttp\Client;
use Illuminate\Contracts\Validation\Rule;

class Recaptcha implements Rule
{

    public function passes($attribute, $value)
    {
        $client = new Client();
        $response = $client->request(
            'POST',
            'https://www.google.com/recaptcha/api/siteverify',
            [
                'form_params' => [
                    'secret' => env('RECAPTCHA_SECRET_KEY'),
                    'response' => $value,
                    'remoteip' => $_SERVER['REMOTE_ADDR'],
                ],
            ]
        );

        if ($response->getStatusCode() == 200) {
            $body = json_decode((string) $response->getBody());

            return $body->success;
        }

        return false;
    }

    public function message()
    {
        return 'Failed reCAPTCHA validation.';
    }
}
