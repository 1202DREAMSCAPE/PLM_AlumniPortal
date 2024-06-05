<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckAdminAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        $adminStudentNos = ['202410032', '202410034'];
        if ($user && in_array($user->student_no, $adminStudentNos)) {
            return $next($request);
        }

        return redirect('/')->with('error', 'Unauthorized access to the admin panel.');
    }
}
