<?php

namespace App\Models;

use App\Models\Journal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable=['category_name'];

    public function journals(){
        return $this->hasMany(Journal::class,'category_id','id');
    }
}
