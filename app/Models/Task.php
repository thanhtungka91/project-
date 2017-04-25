<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public $timestamps = true;
    protected $table = "tasks";
    protected $fillable = [
        'name',
        'content'
    ];
}
