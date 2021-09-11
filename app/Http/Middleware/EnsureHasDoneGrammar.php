<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EnsureHasDoneGrammar
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
        $count = DB::table('grammar_test_scores')
            ->where('email', $email)
            ->count();
        if ($count == 0) {
            if ($request->route()->getName() != 'writer-test') {
                return redirect()->to(route('writer-test'));
            }
        } else {
            $failed = DB::table('writers')
                ->where('email', $email)
                ->value('failed_test');

            if ($failed == 1) {
                $failedPage = $request->routeIs('writer-failed');
                if (!$failedPage) {
                    return redirect(route('writer-failed'));
                }
            } else {
                $doneGrammar = DB::table('grammar_test_scores')
                    ->where('email', $email)
                    ->count();

                if ($doneGrammar != 0) {
                    $score = DB::table('grammar_test_scores')
                        ->where('email', $email)
                        ->value('score');

                    if ($score == 20) {
                        $approved = DB::table('writers')
                            ->where('email', $email)
                            ->value('approved');
                        if ($approved == 1) {
                            $ordersPage = $request->routeIs('available-orders');
                            if (!$ordersPage) {
                                return redirect()->to(route('available-orders'));
                            }
                        } else {
                            $reviewPage = $request->routeIs('writer-review');
                            if (!$reviewPage) {
                                return redirect()->to(route('writer-review'));
                            }
                        }
                    }
                }
            }
        }

        return $next($request);

    }
}
