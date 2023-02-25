<?php

namespace App\Services\Sms\Ghasedak;

use App\Services\ApiAbstract;

class SmsGhasedak extends ApiAbstract
{
    /** @var string $apiKey */
    private string $apiKey;

    /**
     * Construct.
     */
    public function __construct()
    {
        $this->url = config('custom.sms.sms_url_ghasedak') ;
        $this->apiKey = config('custom.sms.ams_api_key_ghasedak') ;
    }


    /**
     * @return string[]
     */
    protected function getHeaders(): array
    {
        return [
            'apikey' => $this->apiKey,
            'content-type' => 'application/x-www-form-urlencoded',
            'cache-control' => 'no-cache'
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
            '/v2/sms/send/simple',
            [
                'message' => urlencode($messages),
                'receptor' => $mobile,
            ]
        );
    }
}
