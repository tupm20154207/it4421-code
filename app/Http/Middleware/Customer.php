<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class Customer
{

  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request $request
   * @param  \Closure $next
   * @return mixed
   */
  public function handle($request, Closure $next)
  {
    if (!$request->user())
    {
      return redirect('login');
    }
    elseif ($request->user()->role != "customer"){
      return abort('404');
    }
    else {
      return $next($request);
    }
  }
}
