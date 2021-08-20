<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tempord extends Model
{
    use HasFactory;
    public $fillable = [
        'order_no',
        'product_no',
        'user_name',
        'price',
        'quantity',    ];
}
