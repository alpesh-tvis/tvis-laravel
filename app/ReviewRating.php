<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class ReviewRating extends Model
{   
    protected $guarded = ['created_at', 'updated_at', 'deleted_at'];

    public function posts(){
       return $this->belongsTo('App\Post');
    }
}
