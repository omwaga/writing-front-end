<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class Notifications extends Controller
{
    public function index()
    {
        $result = DB::table('notifications')->where('user_id')->orWhere('for', Auth()->user()->id)->orderBy('id', 'desc')->get();

        return view('notifications', ['notifications' => $result]);
    }
}
