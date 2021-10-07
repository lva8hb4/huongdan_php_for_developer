<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DangNhapMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->session()->get('userCurrent') == null)
        {
            return redirect('/dangNhap');
        }
        
        return $next($request);
    }
}
