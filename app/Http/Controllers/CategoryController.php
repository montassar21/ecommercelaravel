<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CategoryController extends Controller
{
    public function ListeCategories(){
        $categories = DB::select('select * from categories');
        return view('admin.index')->with('categories',$categories);
    }
    public function AddCategory(Request $request){
        $request->validate([
            'categoryName'=>'required',
            'categoryDescrp'=>'required'
        ]);
        if($request){
            $name = $request->input('categoryName');
            $description = $request->input('categoryDescrp');
            $data=array('name'=>$name,"description"=>$description);
            DB::table('categories')->insert($data);
return redirect()->back();}
}
public function ModifyCategory(Request $request){
    $request->validate([
        'nom'=>'required',
        'longdesc'=>'required'
    ]);
        $id=$request->id;
        $name = $request->input('nom');
        $description = $request->input('longdesc');
        $data=array('name'=>$name,"description"=>$description);
        $upd= Category::where('id',$id)->update($data);
 return redirect()->back();
}
public function SupprimerCategory($id){
     $cat=Category::find($id);
       if($cat->delete())
        return redirect()->back();
        else{
            echo "Error";
        }
}
}
