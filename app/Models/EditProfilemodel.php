<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EditProfilemodel extends Model
{   
    use HasFactory, Notifiable;

    protected $fillable = [
        'user_name',
        'password',
        'city',
        'address',
        'phone',
    ];
}
