<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category_Book extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function book(){
        return $this->belongsTo('App\Models\Book');
    }
}
