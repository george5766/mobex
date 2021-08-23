<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;

class ProductM extends Model
{
    use HasFactory;

    protected $primaryKey="product_no";
    protected $fillable = [
        'product_no',
        'store_no',
        'product_name',
        'product_description',
        'offer',
        'product_price',
        'product_image',
        'product_category',
    ];

    public function store()
{
    return $this->belongsTo(Store::class,'store_no','store_no');
}

}
