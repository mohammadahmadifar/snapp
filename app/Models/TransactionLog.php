<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'origin_card',
        'destination_card',
        'price',
        'wage',
    ];
}
