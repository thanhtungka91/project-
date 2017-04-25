<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = "questions";
    protected $fillable = [
        'question',
        'question_type',
        'answers',
        'answers_key',
        'answer_text',
        'comment',
        'public',
        'time_allowed',
    ];
}
