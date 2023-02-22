<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CardNumber extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_number_id',
        'card_number',
    ];

    /**
     * @return BelongsTo
     */
    public function accountNumber(): BelongsTo
    {
        return $this->belongsTo(AccountNumber::class);
    }
}
