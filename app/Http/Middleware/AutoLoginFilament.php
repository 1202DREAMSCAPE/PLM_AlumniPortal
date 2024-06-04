<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AutoLoginFilament
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->is('login') || $request->is('logout')) {
            return $next($request);
        }
        
        if (!Auth::check()) {
            $user = User::where('student_no', '201900001')->first(); 
            if ($user) {
                Auth::login($user);
            }
        }

        return $next($request);
    }
}
