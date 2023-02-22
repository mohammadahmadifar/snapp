<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartNumber extends Model
{
    use HasFactory;
    protected $fillable = [
        'account_number_id',
        'cart_number',
    ];
}
