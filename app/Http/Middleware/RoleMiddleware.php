<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if ($request->user()->role == $role) {
            return $next($request);
        } else {
            // echo '<script>alert("Anda tidak memiliki akses ke halaman ini");</script>';
            return redirect('/');
        }
        // return $next($request);
    }
}
