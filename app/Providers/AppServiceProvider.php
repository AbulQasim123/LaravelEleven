<?php

namespace App\Providers;

use App\Models\User;
use App\Services\PaymentGateway;
use Illuminate\Foundation\Console\AboutCommand;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Enum;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PaymentGateway::class, function () {
            return new PaymentGateway('23423423');
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        /*
            We can create multiple gates
            And can use Route Controller Blade and Middleware
        */
        Gate::define('isAdmin', function (User $user) {
            return $user->role === 'admin';
        });

        Response::macro('something', function ($data) {
            return Response::json([
                'status' => true,
                'data' => $data,
            ]);
        });

        // Boot the AboutCommand
        AboutCommand::add('Laravel Docs', [
            'type' => 'Artisan Hub',
            'author' => 'Abul Qasim',
        ]);
    }
}
