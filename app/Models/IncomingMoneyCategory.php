<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomingMoneyCategory extends Model
{
    use HasFactory;

    protected $table = 'incoming_money_category';

    protected $fillable = [
        'id_user',
        'category',
    ];
}
