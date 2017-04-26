<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $timestamps = true;
    protected $table = "users";
    protected $fillable = [
        'name',
        'email',
        'password',
        'remember_token',
        'create_at',
        'update_at',
        'admin',
        'active'
    ];
    protected $hidden = [
        'login_password',
        'password_generation'
    ];
    public function isAdmin()
    {
        return $this->admin;
    }

    protected $defaults = array(
        'admin'=> 0,
        'active'=> 0
    );
}
