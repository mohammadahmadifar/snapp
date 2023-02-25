<?php

namespace App\Http\Resources\Bank;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionLogBestIn10MinResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        return [
            'user_id' => $this['user_id'],
            'data' => TransactionLogResource::collection($this['data'])
        ];
    }
}
