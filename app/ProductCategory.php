<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Api\ProductCategoryController;
class ProductCategory extends Model
{
    protected $table='product_cat';
    protected $fillable = [
        'id','product_id', 'name', 'slug', 'description', 'image'
    ];
    protected $guarded=['id'];


    public function parent()
    {
        return $this->belongsTo(ProductCategory::class, 'id');
    }

    public function children()
    {
        return $this->hasMany(ProductCategory::class, 'id');
    }

    public function product() {
        return $this->hasMany(Product::class);
    }

    public function products()
        {
          return $this->hasMany('App\Product');
        }
}
