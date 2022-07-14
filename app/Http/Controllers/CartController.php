<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;
use App\Models\LineCart;
use App\Models\User;
use App\Models\Category;

class CartController extends Controller
{
    public function shopCart(Request $req){
        if($req->idPd !=NULL){
        $categories=Category::all();
       $commande= Cart::where('id_client',Auth::user()->id)->where('etat','encours')->first();
    if($commande){
        $ligneC= new LineCart();
        $ligneC->qte=1;
        $ligneC->id_product=$req->idPd;
        $ligneC->id_command=$commande->id;
        if($ligneC->save()){
        return redirect('/cart')->with('c',$commande);
    }
        else echo "Error";

    }
    else{
        $commande= new Cart();
        $commande->id_client=Auth::user()->id;
        if($commande->save()){
            $ligneC= new LineCart();
            $ligneC->qte=1;
            $ligneC->id_product=$req->idPd;
            $ligneC->id_command=$commande->id;
            if($ligneC->save()){
                $req->idPd=NULL;

            return redirect('/cart')->with('c',$commande);
        }
            else echo "Error";

        }
        else{
            echo 'Error';
        }
    }
    }
    else{
        return redirect('/cart');
    }
}
public function getElem($id){
return Cart::where('id_client',$id)->where('etat','encours')->first();}

}
