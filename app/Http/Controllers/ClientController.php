<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Cart;
use App\Models\LineCart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class ClientController extends Controller
{
    public function dashboard(){
        return view('client.dashboard');
    }
public function cart(){
    if(Auth::user()){
    $commande= Cart::where('id_client',Auth::user()->id)->where('etat','encours')->first();
    return view('guest.shopping-cart')->with('c',$commande);}

}
public function deleteProduct($id){
    $prod= LineCart::where('id',$id);
    $prod->delete();
    return redirect()->back();
}
public function updateCart(request $req){
$prod=LineCart::find($req->id);
$prod->qte=$req->updateqte;
if($prod->update())
return redirect()->back();
}}
