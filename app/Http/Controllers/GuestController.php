<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Models\Cart;
use App\Models\LineCart;
class GuestController extends Controller
{
    public function home(){
        $products=Product::all();
        $categories=Category::all();
        if(Auth::user()){
        $commande= Cart::where('id_client',Auth::user()->id)->where('etat','encours')->first();
        return view('guest.home')->with('products',$products)->with('categories',$categories)->with('c',$commande);}
        else{
            return view('guest.home')->with('products',$products)->with('categories',$categories);
        }
    }
    public function shop(){
        $products=Product::all();
        $categories=Category::all();
        if(Auth::user()){
            $commande= Cart::where('id_client',Auth::user()->id)->where('etat','encours')->first();
        return view('guest.shop')->with('products',$products)->with('categories',$categories)->with('c',$commande);}
            else{
                return view('guest.shop')->with('products',$products)->with('categories',$categories);
            }
    }
    public function prodDet($id){
        $pd=Product::find($id);
        if(Auth::user()){
            $commande= Cart::where('id_client',Auth::user()->id)->where('etat','encours')->first();
            //les produits qui sont commandes par le lient connectes
        return view('guest.product-details')->with('product',$pd)->with('c',$commande);}
        else{
            return view('guest.product-details')->with('product',$pd);
        }
    }
    public function shopCat($id){
        $products=Product::where('id_category',$id)->get();
        $categories=Category::all();
        if(Auth::user()){
            $commande= Cart::where('id_client',Auth::user()->id)->where('etat','encours')->first();
            //les produits qui sont commandes par le lient connectes

        return view('guest.shop')->with('products',$products)->with('categories',$categories)->with('c',$commande);}
        else{
            return view('guest.shop')->with('products',$products)->with('categories',$categories);
        }
    }
    public function prodSearc(Request $req){

        $categories=Category::all();
    $pd=Product::where('ProdName','LIKE','%'.$req->prodName.'%')->get();
    if(Auth::user()){
        $commande= Cart::where('id_client',Auth::user()->id)->where('etat','encours')->first();
        //les produits qui sont commandes par le lient connectes

    return view('guest.shop')->with('products',$pd)->with('categories',$categories)->with('c',$commande);}
    else{
        return view('guest.shop')->with('products',$pd)->with('categories',$categories);    }
    }
    public function contact(){
        $products=Product::all();
        $categories=Category::all();
        if(Auth::user()){
        $commande= Cart::where('id_client',Auth::user()->id)->where('etat','encours')->first();
        //les produits qui sont commandes par le lient connectes
        return view('guest.contact')->with('products',$products)->with('categories',$categories)->with('c',$commande);}
        else{
            return view('guest.contact')->with('products',$products)->with('categories',$categories);
        }
    }

    public function profile(){
       return view('client.modify-profile');
    }
    public function modifyProfile(Request $req){
        Auth::user()->name=$req->name;
        Auth::user()->email=$req->email;
        if(Auth::user()->password)
        Auth::user()->password=Hash::make($req->password);
        if(Auth::user()->update()){
            return redirect()->back()->with('success','profile updated with success');

        }
        else{
            return redirect()->back()->with('error','Error');

        }
     }

}
