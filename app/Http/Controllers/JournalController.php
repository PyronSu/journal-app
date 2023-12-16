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
}
