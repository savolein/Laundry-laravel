<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerMiddleware
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
        // Contoh logika untuk memeriksa apakah pengguna adalah customer
        if (auth()->check() && auth()->user()->role === 'customer') {
            return $next($request);
        }
        
        return redirect('/aa');
    }
}