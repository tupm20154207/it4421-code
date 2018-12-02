<?php

namespace App\Http\Middleware;

use Closure;

class RestaurantManagerMiddleware
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
    if ($request->user() && $request->user()->role != "restaurant_manager")
    {
      return abort(404);
    }
    return $next($request);
  }
}
