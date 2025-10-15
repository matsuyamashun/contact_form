<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // ログイン画面
        Fortify::loginView(function () {
            return view('login');
        });

        // 登録画面
        Fortify::registerView(function () {
            return view('register');
        });
    }
}
