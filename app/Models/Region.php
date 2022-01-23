<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    public function country(){
        return $this->belongsTo('App\Models\Country');
    }

    public function user(){
        return $this->hasMany('App\Models\User');
    }

    public function region_book(){
        return $this->hasMany('App\Models\Region_Book');
    }
}
