<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = "courses";
    protected $fillable = [
        'course_name',
        'start_time',
        'subject_name',
        'subject_overview',
        'instructor_name',
        'instructor_infor',
        'video',
        'thumbnail',
        'slide',
        'public'
    ];
}
