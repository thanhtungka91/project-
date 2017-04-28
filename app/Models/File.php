<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = "file_object";
    protected $fillable = [
        'name_url',
        'type',
        'public'
    ];
}

/*
 * 1. video
 * 2. thumbnail
 * 3. pdf (accept multi)
 */