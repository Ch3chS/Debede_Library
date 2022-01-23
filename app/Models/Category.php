<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class Category extends Model
{
    use HasFactory;
    use Softdeletes;

    public function category_book(){
        return $this->hasMany('App\Models\Category_Book');
    }
}
