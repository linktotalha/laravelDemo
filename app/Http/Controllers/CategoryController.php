<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use Validator;

class CategoryController extends Controller
{
    public function __construct() {
        return $this->middleware('auth');
    }
    public function categories() {
        return view('category');
    }

    public function add_categories(Request $req){
       $validator = Validator::make($req->all(),[
        'name'=>'required',
        'desc'=>'required'
       ]);

       if ($validator->fails()) {
        return response()->json($validator->errors());
     };

     Category::create([
        'name'=>$req->name,
        'desc'=>$req->desc,
        'user_id'=>Auth::id()
     ]);
     return response()->json(['message'=>"Data Added Successfully"]);
    }

    public function categoriesList(){
        $categories = Category::all();
        return view('category_list',compact('categories'));
    }

    public function deleteCategory($id){
        $category = Category::find($id);
        $category->delete();
        return response()->json(['message'=>'Data deleted Successfully']);
    }
}
