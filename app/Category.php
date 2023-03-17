<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{   
    protected $table='categories';
    protected $fillable = [
        'id', 'name', 'slug', 'description', 'image'
    ];
    protected $guarded = ['created_at', 'deleted_at', 'updated_at'];

    
}
