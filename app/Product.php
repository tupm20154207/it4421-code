<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  public $timestamps = false;
  public function category()
  {
    return $this->belongsTo('App\Category');
  }

  public function cart_items()
  {
    return $this->hasMany('App\CartItem', 'product_id', 'id');
  }

  public function likes()
  {
    return $this->hasMany('App\Like', 'product_id', 'id');
  }
}
