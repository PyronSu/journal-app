<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function home(Request $request){
        $journals = Journal::orderBy('id','desc')->get()->toArray();
        $categories = Category::all()->toArray();
        $category_id = Category::latest('id')->value('id')+1;
        return view('index',compact('categories','category_id','journals'));
    }

    public function createCategory(Request $request){
        Category::create($request->all());
        // return redirect()->route('journal#home');
        return back();
    }

    public function setting(Request $request){
        $categories = Category::all()->toArray();
        $category_id = Category::latest('id')->value('id')+1;
        return view('setting',compact('categories','category_id'));
    }


    //category in setting store
    public function store(Request $request){
        $c_id = $request->id;
        $category = Category::updateOrCreate(
            ['id'=>$c_id],
            ['category_name'=>$request->category]
        );
        return Response()->json($category);
    }
}
