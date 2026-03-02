<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserName extends Model{
    protected $table = 'user_name';
    protected $primayKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'username',
        'role'
    ]; 
}
