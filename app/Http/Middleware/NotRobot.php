<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NotRobot
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

    //    Session::remove('not_a_robot');
        $notarobot = Session::get('not_a_robot');
        $notarobot = $notarobot;
        if ($notarobot && $notarobot !== null && $notarobot->success) {
            return $next($request);
        }

        return redirect(route('not-a-robot'));

    }
}
