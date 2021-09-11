<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Writer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Laravel\Jetstream\Jetstream;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        $this->configurePermissions();

        Fortify::authenticateUsing(function (Request $request) {
            $email = $request->email;
            $count = DB::table('users')->where('email', $email)->count();
            if ($count == 1) {
                $id = DB::table('users')->where('email', $email)->value('id');
                $user = User::find($id);
                if ($user &&
                    Hash::check($request->password, $user->password)) {
                    return $user;
                } else {
                    return null;
                }
            } else {
                $count = DB::table('writers')->where('writer_email', $email)->count();
                if ($count == 1) {
                    $id = DB::table('writers')->where('writer_email', $email)->value('id');
                    $user = Writer::find($id);
                    if ($user &&
                        Hash::check($request->password, $user->password)) {
                        return $user;
                    } else {
                        return null;
                    }
                } else {
                    return null;
                }
            }
        });
    }

    /**
     * Configure the roles and permissions that are available within the application.
     *
     * @return void
     */
    protected function configurePermissions()
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::role('admin', __('Administrator'), [
            'create',
            'read',
            'update',
            'delete',
        ])->description(__('Administrator users can perform any action.'));

        Jetstream::role('editor', __('Editor'), [
            'read',
            'create',
            'update',
        ])->description(__('Editor users have the ability to read, create, and update.'));
    }
}
