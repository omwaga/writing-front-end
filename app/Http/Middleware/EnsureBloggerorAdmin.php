<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureBloggerorAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $blogger = Auth::user()->blogger;
        if ($blogger == 0) {
            return redirect(route('home'));
        }

        return $next($request);
    }
}
