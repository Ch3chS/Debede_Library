<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class Book extends Model
{
    use HasFactory;
    use Softdeletes;

    public function user_book(){
        return $this->hasMany('App\Models\User_Book');
    }

    public function category_book(){
        return $this->hasMany('App\Models\Category_Book');
    }

    public function region_book(){
        return $this->hasMany('App\Models\Region_Book');
    }
}
