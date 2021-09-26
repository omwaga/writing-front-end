<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

use Artesaos\SEOTools\Facades\SEOMeta;

class Captchav2Controller extends Controller
{

    public function NotARobot(Request $request)
    {
        //Page SEO
        SEOMeta::setTitle("Login")
        ->setDescription("Essay Flame Login");
            
        return view('not-a-robot');
    }


    public function store(Request $request)
    {
        $secret = \config('app.g_secret_key');

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => $secret,
            'response' => $request['g-recaptcha-response'],
        ]);

        $response = json_decode($response->body());
        if($response->success) {
            Log::info("Not a robot ....", [$response]);
            session()->put([
                'not_a_robot' => $response,
            ]);
            return redirect()->intended('/login');
        }else{
            Log::error("Robot Attempt....", [$response]);
            session()->forget('not_a_robot');
            return redirect()->back()->withErrors(['access', 'Something went wrong']);;
        }
    }

    public static function verifyCaptcha(Request $request)
    {
        $secret = \config('app.g_secret_key');

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => $secret,
            'response' => $request['g-recaptcha-response'],
            'remoteip' => $request['g-recaptcha-response'],
        ]);



        $response = json_decode($response->body());

        session()->put([
            'payload' => $response,
        ]);

        if($response->success) {
            Log::info("Not a robot ....", [$response]);
            return true;
        }else{
            Log::error("Robot Attempt....", [$response]);
        }

        return false;
    }
}
