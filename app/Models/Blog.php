<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class Blog extends Model
{
    use HasFactory;
    protected $fillable =[
        'title',
        'content',
        'genre',
        'author',
        'tags',
        'publish_date',
        'blog_image',
    ];

    //blogs have many comments
    public function comments()
{
    return $this->hasMany(Comment::class);
}
}
