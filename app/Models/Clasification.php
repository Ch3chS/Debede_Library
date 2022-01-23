<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clasification extends Model
{
    use HasFactory;

    public function region_book(){
        return $this->hasMany('App\Models\Region_Book');
    }
}
