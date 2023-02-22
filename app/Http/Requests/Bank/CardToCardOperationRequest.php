<?php

namespace App\Http\Requests\Bank;

use App\Http\Requests\BaseRequest;

/**
 * @property string $origin_card
 * @property string $destination_card
 * @property integer $price
 */
class CardToCardOperationRequest extends BaseRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'origin_card' => $this->card(),
            'destination_card' => $this->card(),
            'price' => 'required|min:10000|max:500000000|numeric',
        ];
    }

    /**
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'origin_card' => $this->convertToEnglish($this->origin_card),
            'destination_card' => $this->convertToEnglish($this->destination_card),
            'price' => $this->convertToEnglish($this->price),
        ]);
    }

}
