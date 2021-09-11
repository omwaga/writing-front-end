<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {

        $is_not_robot = Captchav2Controller::verifyCaptcha($request);

        if(!$is_not_robot){
            return redirect()->back()->withErrors(["errors" => [
                "g_recaptcha" => "robot"
            ]]);
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $notifications = DB::table('notifications')->orWhere('for', Auth::user()->id)->leftJoin('users', 'notifications.user_id', 'users.id')->select('notifications.id as id', 'notifications.notification', 'users.name as username', 'users.profile_photo_path as profile_photo_path')->orderBy('id', 'desc')->limit(5)->get();
            Session::put('notifications', $notifications);
            return redirect('/user/my-orders');
        } elseif (Auth::guard('writers')->attempt($credentials)) {
            $notifications = DB::table('notifications')->orWhere('for', Auth::guard('writers')->user()->id)->leftJoin('users', 'notifications.user_id', 'users.id')->select('notifications.id as id', 'notifications.notification', 'users.name as username', 'users.profile_photo_path as profile_photo_path')->orderBy('id', 'desc')->limit(5)->get();
            Session::put('notifications', $notifications);
            return redirect()->to(route('available-orders'));
        } else {
            $errors = "User with these credentials does not exist";
            return redirect()->back()->withErrors($errors);
        }
    }
}
