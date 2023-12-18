<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class JournalController extends Controller
{
    public function create(){
        $categories = Category::all()->toArray();
        $category_id = Category::latest('id')->value('id')+1;
        $currentTime = Carbon::now();
        return view('createJournal',compact('categories','category_id','currentTime'));
    }

    // save data to DB
    public function save(Request $request){
        dd($this->getData($request));

    }

    //read journal
    public function read(){
        $categories = Category::all()->toArray();
        $category_id = Category::latest('id')->value('id')+1;
        $currentTime = Carbon::now();
        return view('readJournal',compact('categories','category_id','currentTime'));
    }

    //request data from form
    private function getData($request){
        $data = [
            'title' => $request->title,
            'journal' =>$request->journal,
            'category_id' => $request->category_id
        ];
        return $data;
    }
}
