<?php

namespace App\Providers;
use Illuminate\Contracts\Auth\Access\Gate as MyGate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as  ProvidersAuthServiceProvider;

use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ProvidersAuthServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(MyGate $gate): void
    {

        $this->registerPolicies($gate);

        $gate->define('is_admin',function($user){
            return $user->role== 'admin' ;
        });



        $gate->define('is_user',function($user){
            return $user->role== 'user' ;
        });
    }

    }

