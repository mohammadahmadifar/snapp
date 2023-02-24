<?php

namespace App\Services\Sms\Kavenegar;

use App\Services\ApiAbstract;

class SmsKavenegar extends ApiAbstract
{
    /**
     * Construct.
     */
    public function __construct()
    {
        $this->url = config('custom.sms.sms_url_kavenegar') . '/v1/' . config('config.sms.ams_api_key_kavenegar');
    }

    /**
     * @return string[]
     */
    protected function getHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
        ];
    }

    /**
     * @param string $messages
     * @param string $mobile
     * @return array
     * @throws \Exception
     */
    public function sendMessage(string $messages, string $mobile): array
    {
        return $this->post(
            '/sms/send.json',
            [
                'message' => urlencode($messages),
                'receptor' => $mobile,
            ]
        );
    }
}
