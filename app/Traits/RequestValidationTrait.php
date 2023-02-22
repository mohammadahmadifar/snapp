<?php

namespace App\Traits;

use App\Models\File\File;
use App\Models\Stock\Basket;
use App\Models\Stock\Symbol;
use App\Models\User\Analyst;
use App\Models\User\User;
use Illuminate\Validation\Rule;

trait RequestValidationTrait
{
    /**
     * @param array $rules Rules.
     *
     * @return array
     */
    public function card(array $rules = []): array
    {
        return array_merge(
            [
                'required',
                'numeric',
                'digits:16',
                Rule::exists('card_numbers', 'card_number'),
            ],
            $rules
        );
    }

    /**
     * @param $string
     * @return string
     */
    function convertToEnglish($string): string
    {
        $newNumbers = range(0, 9);
        $arabic = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
        $persian = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
        $string = str_replace($arabic, $newNumbers, $string);

        return str_replace($persian, $newNumbers, $string);
    }
}
