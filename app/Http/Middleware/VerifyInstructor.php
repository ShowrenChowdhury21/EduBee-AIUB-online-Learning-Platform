<?php

namespace App\Http\Middleware;

use Closure;

class VerifyInstructor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      if($request->session()->get('type') == "instructor"){
          return $next($request);
      }else{
          return redirect('/login');
      }
    }
}
