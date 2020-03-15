<?php

namespace App\Http\Middleware;

use Closure;

class MiddlewareAdminLogged
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
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(isset($_SESSION['admin'])){
            
            return redirect('admin');
        }
        return $next($request);
    }
}
