<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'from',
        'to',
        'price',
        'start_date',
        'end_date',
        'duration',
        'desc',
        'passengers',
    ];
}