<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;


    // relacion inversa
    public function order_products(){
        return $this->belongsTo('App\Models\Order_product');
    }
}
