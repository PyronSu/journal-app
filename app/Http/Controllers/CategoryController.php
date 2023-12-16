<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function home(Request $request){
        $categories = Category::all()->toArray();
        $category_id = Category::latest('id')->value('id')+1;
        return view('index',compact('categories','category_id'));
    }

    public function createCategory(Request $request){
        Category::create($request->all());
        return redirect()->route('journal#home');
    }
}
