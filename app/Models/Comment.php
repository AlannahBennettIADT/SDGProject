<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Blog;
use App\Models\User;

class Comment extends Model
{
    //comments only have content in them
    use HasFactory;
    protected $fillable = [
        'content',
    ];


    //every comment belongs to one blog
    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

    //every comment is made by one user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}


