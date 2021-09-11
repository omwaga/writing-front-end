<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InProgress extends Controller
{
    public function index()
    {
        $email = Auth::user()->email;
        $id = DB::table('users')->where('email', $email)->value('id');
        $result = DB::table('orders')
            ->where('user_id', $id)
            ->where('in_progress', '=', 1)
            ->orderBy('id', 'desc')
            ->paginate(6);

        return view('user.orders', ['orders' => $result]);
    }
}
