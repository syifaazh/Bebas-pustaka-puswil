<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CekRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,  $cekRole)
    {
        if ($request->user()->userrole->name == $cekRole) {
            return $next($request);
        }

        return redirect('/dashboard')->with('delete', 'Anda tidak punya akses ke halaman tersebut!!!');
    }
}
