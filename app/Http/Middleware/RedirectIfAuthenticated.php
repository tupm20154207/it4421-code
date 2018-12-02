<?php

namespace App\Http\Middleware;

use Closure;
use function Couchbase\defaultDecoder;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request $request
   * @param  \Closure $next
   * @param  string|null $guard
   * @return mixed
   */
  public function handle($request, Closure $next, $guard = null)
  {
    if (Auth::guard($guard)->check()) {
      return $this->redirectTo();
    }
    return $next($request);
  }

  public function redirectTo()
  {
    $role = Auth::user()->role;
    switch ($role){
      case 'admin':
        return redirect('admin');
        break;
      case 'order_manager':
        return redirect('order_manager');
        break;
      case 'restaurant_manager':
        return redirect('restaurant_manager');
        break;
      case 'customer':
        return redirect('/');
        break;
      default:
        return redirect('/');
        break;
    }
  }
}
