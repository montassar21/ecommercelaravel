<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\LineCart;
use App\Models\User;

class Cart extends Model
{
    use HasFactory;
    public function ligneCommandes(){
        return $this->hasMany(LineCart::class,'id_command','id');
    }
    public function client(){
        return $this->belongsTo(User::class,'id_client','id');
    }
    public function getUserNameByID($id){
        return Cart::where('id_client',$id)->where('etat','encours')->first();}
        public function getTotal(){
            $tot=0;
            foreach($this->ligneCommandes as $lig)
            $tot+=$lig->product->prix*$lig->qte;
            return $tot;
        }
        public function getNumberOfProducts(){
            $tot=0;
            foreach($this->ligneCommandes as $lig)
            $tot+=$lig->qte;
            return $tot;
        }
}
