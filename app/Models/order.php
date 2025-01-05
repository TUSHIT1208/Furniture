<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class order extends Model
{
    use HasFactory;

    protected $fillable = [
        'cartitem_id',
        'country',
        'first_name',
        'last_name',
        'address',
        'state',
        'pincode',
        'phone',
        'email',
    ];
    

    public $timestamps = false;

    public function cartitem(){
        return $this->belongsTo(cartitem::class);
    }

    public function orderitems(){
        return $this->hasMany(orderitem::class);
    }
}
