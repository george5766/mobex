<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class UserCostom extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_name',
        'password',
        'city',
        'address',
        'sex',
        'phone',
        'first_name',
        'middle_name',
        'last_name',
        'mother_name',
        'dateofbirth',
        'account_status',
        'profile_image',
        'balance',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'token',
        'imageID',
        'cardID',
        'remember_token',
    ];

}
