<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
    * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return \Illuminate\Http\Response
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Periksa apakah status pengguna sesuai dengan parameter $role
        if (auth()->user()->status !== $role) {
            // Jika status tidak cocok, arahkan ke halaman yang sesuai
            return redirect('/home');  // Atau ke halaman lain yang Anda inginkan
        }

        return $next($request);
    }
}