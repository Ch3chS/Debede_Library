<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class Clasification extends Model
{
    use HasFactory;
    use Softdeletes;

    public function region_book(){
        return $this->hasMany('App\Models\Region_Book');
    }
}
