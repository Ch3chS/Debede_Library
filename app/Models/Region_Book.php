<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class Region_Book extends Model
{
    use HasFactory;
    use Softdeletes;

    public function book(){
        return $this->belongsTo('App\Models\Book');
    }

    public function region(){
        return $this->belongsTo('App\Models\Region');
    }
    
    public function clasification(){
        return $this->belongsTo('App\Models\Clasification');
    }
}
