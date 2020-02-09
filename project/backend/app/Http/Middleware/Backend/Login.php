<?php

namespace App\Http\Middleware\Backend;

use Closure;

class Login
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
        if(!session('backend_user')){ 
                     
            return redirect('backend\login');
        }
        return $next($request);
    }
}
