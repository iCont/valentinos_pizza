<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_product extends Model
{
    use HasFactory;

    // relacion uno a muchos
    public function discounts(){
        return $this->hasMany('App\Models\Discount');
    }
}



