<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;
use App\Models\Product;
class LineCart extends Model
{
    use HasFactory;
    public function commande(){
        return $this->belongsTo(Cart::class,'id_command','id');
    }
    public function product(){
        return $this->belongsTo(Product::class,'id_product','id');
    }
}
