<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class Role extends Model
{
    use HasFactory;
    use Softdeletes;

    public function user(){
        return $this->hasMany('App\Models\User');
    }
}
