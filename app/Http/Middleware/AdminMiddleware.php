<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;



class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!auth()->check()){
            return redirect('/login');
        }

        if(auth()->user()->role != 'admin'){
            abort(403, 'Энэ хуудсанд зөвхөн админ нэвтрэх боломжтой');
        }

        return $next($request);
    }
}
