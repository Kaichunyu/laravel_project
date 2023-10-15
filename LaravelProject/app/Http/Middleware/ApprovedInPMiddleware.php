<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class ApprovedInPMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $status = Auth::user()->approval_status;
        
        if ($status != 'Yes'){
            return redirect()->back()->withErrors(['approval' => 'Please wait for approval before creating new project.']);;

        }

        return $next($request);
    }
}
