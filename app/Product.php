<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
  use SoftDeletes;
  public $timestamps = false;
  protected $dates = ['deleted_at'];
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
