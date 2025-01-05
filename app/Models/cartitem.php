<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cartitem extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    public function cart(){
        return $this->belongsTo(cart::class);
    }

    public function products(){
        return $this->belongsTo(product::class);
    }

    public function order(){
        return $this->hasMany(order::class);
    }
}
