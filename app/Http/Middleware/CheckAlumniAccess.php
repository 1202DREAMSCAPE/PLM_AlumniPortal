<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckAlumniAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\Response
     */
    public function handle(Request $request, Closure $next)
    {
        $students = Auth::user();
        $alumniRoles = ['33']; 

        if ($students && (in_array(Session::get('role_id'), $alumniRoles) || !is_null($students->year_graduated))) {
            return $next($request);
        }

        return redirect('/') 
            -> with('error', 'Unauthorized access to the alumni panel.');
    }
}
