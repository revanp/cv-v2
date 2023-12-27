<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormContactUs extends Model
{
    use HasFactory;

    protected $table = 'form_contact_us';

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'subject',
        'message',
    ];

    public $timestamps = true;
}
