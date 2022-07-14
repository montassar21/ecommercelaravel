<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\LineCart;
class Product extends Model
{
    use HasFactory;
    public function category(){
        return $this->belongsTo(Category::class,'id_category','id');
    }
    public function linecommande(){
        return $this->hasMany(LineCart::class,'id_product','id');
    }
}
