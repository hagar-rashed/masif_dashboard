<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QRCode extends Model
{
    use HasFactory;
    protected $table = 'qrcodes';

    protected $fillable = [
        'name',
        'user_type',
        'email',
        'phone',       
        'village_name',
        'date',
        'expiration_date',
        'code',
        'qr_code', // Include this column
    ];
}
