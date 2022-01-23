<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class Country extends Model
{
    use HasFactory;
    use Softdeletes;

    public function region(){
        return $this->hasMany('App\Models\Region');
    }
}
