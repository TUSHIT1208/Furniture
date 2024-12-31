<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;
    protected $fillable = ['name', 'password', 'email','phone','address'];

    public function carts(){
        return $this->hasMany(cart::class,'cust_id');
    }
}
