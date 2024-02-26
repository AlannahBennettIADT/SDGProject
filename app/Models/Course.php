<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable =[
        'title',
        'description',
        'category',
        'level',
        'start_date',
        'end_date',
        'enrollment_deadline',
        'course_image',
        'course_sponsor',
        'sponsor_image',
        'lesson_plan',
    ];
}
