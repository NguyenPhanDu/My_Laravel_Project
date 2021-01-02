<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable=[
        'customer_name',
        'sex',
        'phone_number',
        'email',
        'ardress',
        'id_user'
    ];
}
