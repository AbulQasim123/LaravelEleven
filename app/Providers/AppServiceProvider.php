<?php

namespace App\Providers;

use App\Services\PaymentGateway;
use Illuminate\Foundation\Console\AboutCommand;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

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
        Response::macro('something', function ($data) {
            return Response::json([
                'status' => true,
                'data' => $data,
            ]);
        });

        // Boot the AboutCommand
        AboutCommand::add('Laravel Docs',[
            'type' => 'Artisan Hub',
            'author' => 'Abul Qasim',
        ]);
    }
}
