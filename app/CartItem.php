<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
  public $timestamps = false;
  public function order()
  {
    return $this->belongsTo('App\Order', 'order_id', 'id');
  }

  public function product()
  {
    return $this->belongsTo('App\Product', 'product_id', 'id');
  }
}
