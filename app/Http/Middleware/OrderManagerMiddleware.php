<?php

namespace App\Http\Middleware;

use Closure;

class OrderManagerMiddleware
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
    if ($request->user() && $request->user()->role != "order_manager")
    {
      return abort(404);
    }
    return $next($request);
  }
}
