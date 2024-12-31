<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class product extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];

    public function images(){
        return $this->hasOne(productimage::class,"pid");
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category');
    }

    public function cartitem(){
        return $this->hasMany(cartitem::class,'product_id');
    }
}
