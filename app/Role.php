<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Role extends Model
{
    
    protected $table='roles';
    protected $fillable = [
        'id', 'name', 'guard_name'
    ];
    protected $guarded=['id'];
    
    
}

