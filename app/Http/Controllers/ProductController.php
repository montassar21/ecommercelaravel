<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class ProductController extends Controller
{
public function ListeProducts(){
    $products=DB::select('select * from products');
    $categories=Category::all();
    return view('admin.products')->with('products',$products)->with('categories',$categories);
}
public function AddProduct(Request $req){
    $req->validate([
        'category'=>'required',
        'productName'=>'required',
        'productDescrp'=>'required',
        'productPrix'=>'required',
        'productQte'=>'required',
        'photo'=>'required'
 ]);
    if($req){
        $pd= new Product();
        $pd->ProdName=$req->productName;
        $pd->id_category=$req->category;
        $pd->description=$req->productDescrp;
        $pd->prix=$req->productPrix;
        $pd->qte=$req->productQte;
        $newName=uniqid();
        $image=$req->file('photo');
        $newName.=".".$image->getClientOriginalExtension();
               $destPath='uploads';
        $image->move($destPath,$newName);
        $pd->img=$newName;
        $pd->save();
        return redirect()->back();}
        else{
            echo 'Error';
        }

}
public function ModifyProduct(Request $request){
    $pd=Product::find($request->id);
        $pd->ProdName = $request->nom;
        $pd->description = $request->longdesc;
        $pd->prix = $request->prix;
        $pd->qte = $request->qte;
        if($request->file('photo')){
            $filePath=public_path().'/uploads/'.$pd->img;
             unlink($filePath);
            $newName=uniqid();
            $image=$request->file('photo');
            $newName.=".".$image->getClientOriginalExtension();
            $destPath='uploads';
            $image->move($destPath,$newName);
            $pd->img=$newName;
        }
        if($pd->update())
 return redirect()->back();
 else{
    echo "Error";
 }
}
public function SupprimerProduct($id){
    $pd=Product::find($id);
    $filePath=public_path().'/uploads/'.$pd->img;
    unlink($filePath);
      if($pd->delete())
       return redirect()->back();
       else{
           echo "Error";
       }
}
}
