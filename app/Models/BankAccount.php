<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    use HasFactory;

    protected $table = 'bank_account';

    protected $fillable = [
        'id_user',
        'name',
        'number',
        'amount',
        'is_active',
    ];
}
