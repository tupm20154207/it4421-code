<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
  use Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'fullname', 'email', 'password', 'phone', 'username', 'role'
  ];

  public $timestamps = false;
  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'password', 'remember_token',
  ];

  public function lock_state()
  {
    return $this->hasOne('App\LockState', 'user_id', 'id');
  }

  public function orders()
  {
    return $this->hasMany('App\Order', 'user_id', 'id');
  }

  public function likes()
  {
    return $this->hasMany('App\Like', 'user_id', 'id');
  }
}
