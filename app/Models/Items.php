<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    public $timestamps = true;
    protected $table = "dtb_items";
    protected $fillable = [
        'itemcode',
        'name',
        'imgpath'
    ];
}
