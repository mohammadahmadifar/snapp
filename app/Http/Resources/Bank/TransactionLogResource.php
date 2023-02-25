<?php

namespace App\Http\Resources\Bank;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionLogResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this['id'],
            'origin_card' => $this['origin_card'],
            'destination_card' => $this['destination_card'],
            'price' => $this['price'],
            'wage' => $this['wage'],
        ];
    }
}
