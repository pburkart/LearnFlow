<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    public function handle(Request $request, Closure $next)
    {
        \Log::info('Admin middleware called for user: ' . (Auth::check() ? Auth::user()->id : 'Guest') . ' on route: ' . $request->path());
        \Log::info('Request method: ' . $request->method());

        if (Auth::check() && Auth::user()->is_admin) {
            \Log::info('User is admin, proceeding with request');
            return $next($request);
        }

        \Log::warning('Unauthorized access attempt');
        return redirect('/')->with('error', 'Unauthorized access.');
    }
}