<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
  protected $fillable = [
      'user_id', 'product_id'
  ];
  public $timestamps = false;
  public function user()
  {
    return $this->belongsTo('App\User', 'user_id', 'id');
  }

  public function product()
  {
    return $this->belongsTo('App\User', 'product_id', 'id');
  }
}
