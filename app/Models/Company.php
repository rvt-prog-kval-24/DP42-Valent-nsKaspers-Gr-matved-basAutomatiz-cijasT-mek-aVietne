<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'reg_number',
        'vat_number',
        'address',
        'description',
        'email',
        'phone',
        'api_code'
    ];
}
