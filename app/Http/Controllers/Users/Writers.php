<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Writers extends Controller
{
    public function index()
    {
        $email = Auth::user()->email;
        $id = DB::table('users')->where('email', $email)->value('id');

        $favorite = DB::table('favourite_writers')->where('user_id', $id)->paginate(6);
        $blocked = DB::table('blocked_writers')->where('user_id', $id)->paginate(6);
        $all = DB::table('writers')->orderBy('id', 'asc')->paginate(6);

        return view('user.writers', ['all' => $all, 'favorites' => $favorite, 'blocked' => $blocked]);
    }
}
