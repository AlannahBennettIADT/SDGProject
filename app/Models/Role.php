<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    //users can have many roles

    public function users(){
        return $this->belongsToMany('User','user_role');
    }
}
