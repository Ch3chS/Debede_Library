<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class User_Book extends Model
{
    use HasFactory;
    use Softdeletes;

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function book(){
        return $this->belongsTo('App\Models\Book');
    }
}
