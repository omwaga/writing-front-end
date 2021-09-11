<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Completed extends Controller
{
    public function index()
    {
        $email = Auth::user()->email;
        $id = DB::table('users')->where('email', $email)->value('id');
        $result = DB::table('orders')
            ->where('user_id', $id)
            ->where('completed', '=', 1)
            ->orderBy('id', 'desc')
            ->paginate(6);

        return view('user.orders', ['orders' => $result]);
    }
}
