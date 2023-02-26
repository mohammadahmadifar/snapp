<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

abstract class ApiAbstract
{
    /** @var string $url */
    protected string $url;

    /** @var string $key */
    protected string $key;

    /**
     * @return array
     */
    abstract protected function getHeaders(): array;

    /**
     * @return string
     */
    abstract protected function getPath(): string;


    /**
     * @param string $path
     * @param array|null $data
     * @param array|null $headers
     * @return array
     * @throws \Exception
     */
    protected function post(string $path, ?array $data = [], ?array $headers = null): array
    {
        if (empty($headers)) {
            $headers = $this->getHeaders();
        }
        try {
            $response = Http::withHeaders($headers)->post($this->url . $path, $data);
        } catch (\HttpException $exception) {
            Log::error('Http Exception Error: ' . $exception->getMessage(), $exception->getTrace());
            throw new \Exception('The message was not sent');
        }

        return $response->json();
    }

    public function sendMessage(string $messages, string $mobile): array
    {
        return $this->post(
            $this->getPath(),
            [
                'message' => urlencode($messages),
                'receptor' => $mobile,
            ]
        );
    }


}
