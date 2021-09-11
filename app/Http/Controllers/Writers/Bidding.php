<?php

namespace App\Http\Controllers\Writers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Bidding extends Controller
{
    public function index()
    {
        $email = Auth::user()->email;
        $result = DB::table('bidding_orders')
            ->where('email', $email)
            ->orderBy('id', 'desc')
            ->paginate(6);

        return view('writer.orders', ['orders' => $result]);
    }
}
