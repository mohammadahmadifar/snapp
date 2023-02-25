<?php

return [
    'bank' => [
        'wage' => env('WAGE_BANK', '5000'),
    ],
    'sms' => [
        'sms_sender' => env('SMS_SENDER', 'kavenegar'),
        'sms_url_kavenegar' => env('SMS_URL_KAVENEGAR', 'kavenegar'),
        'ams_api_key_kavenegar' => env('SMS_API_KEY_KAVENEGAR', 'kavenegar'),
        'sms_url_ghasedak' => env('SMS_URL_GHASEDAK', 'kavenegar'),
        'ams_api_key_ghasedak' => env('SMS_API_KEY_GHASEDAK', 'kavenegar'),
    ],

];
