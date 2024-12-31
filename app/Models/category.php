<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;

    public function prod(){
        return $this->hasOne(product::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category');
    }
}
