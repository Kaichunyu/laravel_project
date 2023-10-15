<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class TeacherMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // $teacher = Auth::user()->user_type->name;
        
        // if ($status != 'Teacher'){
        //     return redirect()->back()->withErrors(['approval' => 'Please wait for approval before creating new project.']);;

        // }

        return $next($request);
    }
}
