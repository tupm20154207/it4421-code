<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
  use SoftDeletes;

  protected $dates = ['deleted_at'];
  public $timestamps = false;
  public function products()
  {
    return $this->hasMany('App\Product');
  }
}
