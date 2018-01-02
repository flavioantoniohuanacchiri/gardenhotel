<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Session;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            //dd($request->path());
            if (strpos($request->path(), 'admin/section') !== false){
              return redirect('admin');
            }
            /*if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                if (Session::get("sistema")) {
                    Session::forget("sistema");
                } else {

                }
                return redirect('admin');
                //return redirect()->guest('login');
            }*/
        }
        return $next($request);
    }
}
