<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderitem extends Model
{
    use HasFactory;

    protected $guarded = [];   
    public $timestamps = false;
    public function order()
    {
        return $this->belongsTo(order::class);
    }
    public function product()
    {
        return $this->belongsTo(product::class);
    }
}
