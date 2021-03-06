<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  public function user()
  {
    return $this->belongsTo('App\User', 'user_id', 'id');
  }

  public function cart_items()
  {
    return $this->hasMany('App\CartItem', 'order_id', 'id');
  }
}
