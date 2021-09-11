<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureEmailVerified
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $verified = $request->user()->email_verified;
        if (!$verified) {
            return redirect(route('email-unverified'));
        }

        return $next($request);
    }
}
