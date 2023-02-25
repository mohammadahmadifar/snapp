<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransactionLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'origin_card',
        'destination_card',
        'price',
        'wage',
    ];

    /**
     * @return BelongsTo
     */
    public function cardNumber(): BelongsTo
    {
        return $this->belongsTo(CardNumber::class, 'origin_card','card_number');
    }
}
