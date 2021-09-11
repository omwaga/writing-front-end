<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EnsureHasPassedTest
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
        $email = $request->user()->email;

        $failed = DB::table('writers')
            ->where('email', $email)
            ->value('failed_test');

        if ($failed == 1) {
            $currentPage = $request->routeIs('writer-failed');
            if (!$currentPage) {
                return redirect()->to(route('writer-failed'));
            }
        } else {
            $currentPage = $request->routeIs('writer-failed');
            if ($currentPage) {
                $count = DB::table('grammar_test_score')
                    ->where('email', $email)
                    ->count();

                if ($count == 1) {
                    $score = DB::table('grammar_test_score')
                        ->where('email', $email)
                        ->value('score');

                    if ($score == 20) {
                        $approved = DB::table('writers')
                            ->where('email', $email)
                            ->value('approved');

                        if ($approved == 1) {
                            $ordersPage = $request->routeIs('available-orders');
                            if (!$ordersPage) {
                                return redirect(route('available-orders'));
                            }
                        } else {
                            $reviewPage = $request->routeIs('writer-review');
                            if (!$reviewPage) {
                                return redirect(route('writer-review'));
                            }
                        }
                    }
                }
            }
        }

        return $next($request);
    }
}
