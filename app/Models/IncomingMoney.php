<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomingMoney extends Model
{
    use HasFactory;

    protected $table = 'incoming_money';

    protected $fillable = [
        'id_user',
        'id_bank_account',
        'id_incoming_money_category',
        'amount',
        'remarks',
    ];
}
