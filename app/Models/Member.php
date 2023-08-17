<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'avatar',
        'nik',
        'full_name',
        'address',
        'phone_number',
        'deposit_balance'
    ];
}
