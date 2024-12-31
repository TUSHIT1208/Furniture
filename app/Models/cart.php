<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    public function clients(){
        return $this->belongsTo(Client::class,'cust_id');
    }

    public function cartItem(){
        return $this->hasMany(cartitem::class,'cart_id');
    }
}
