<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Store extends Model
{
    use HasFactory,Notifiable;

    protected $primaryKey = 'store_no';
    protected $fillable = [
        'store_no',
        'user_name',
        'store_name',
        'store_bio',
        'frozen_assest',
        'over_all_profit',
    ];

/**
 * Get the user that owns the ProfileModel
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
public function user()
{
    return $this->belongsTo(User::class,'user_name','user_name');
}
/**
     * Get all of the product for the Store
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function product()
    {
        return $this->hasMany(ProductM::class,'store_no','store_no');
    }


}

