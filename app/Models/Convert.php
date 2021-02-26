<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convert extends Model
{
    use HasFactory;

    protected $fillable = [
        'currency_from',
        'currency_to',
        'value',
        'converted_value',
        'rate',
    ];
}
