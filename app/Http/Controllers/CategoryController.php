<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function home(Request $request){
        $categories = Category::all()->toArray();
        return view('index',compact('categories'));
    }

    public function createCategory(Request $request){
        dd($request->all());
    }
}
