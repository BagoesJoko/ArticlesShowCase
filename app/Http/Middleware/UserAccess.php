<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
    	//Jika role login == 2 maka tidak dapat akses di bawah ini melalui blokir dari route
    	if (auth()->user()->role != $role) {
            // Redirect...
            return abort(403,'Anda tidak punya akses halaman ini');
        }
        return $next($request);
    }
}
