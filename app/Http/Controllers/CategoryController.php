<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categories() {
        return view('category');
    }

    public function add_categories(Request $req){
        return $req;
    }
}
