<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    

    protected $table='products';
    protected $fillable = [
        'id', 'name', 'slug', 'content', 'category', 'image', 'date'
    ];
    protected $guarded=['id'];

    public function category() {
        return $this->belongsTo(ProductCategory::class, 'id');
    }
}
