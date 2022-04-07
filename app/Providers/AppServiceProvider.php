<?php

namespace App\Providers;

use Braintree\Gateway;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
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
        // SINGLETON! Permetto unica istanza
        $this->app->singleton(Gateway::class, function ($app) {
            // CHIAVI BRAINTREE (NON MODIFICARE LE CHIAVI! SONO SPECIFICHE DI BRAINTREE)
            return new Gateway([
                'environment' => 'sandbox',
                'merchantId' => 'xd36hj6xjdq9bphf',
                'publicKey' => 'q6km928x8mwdb6dp',
                'privateKey' => '9c0cb0b1ec11841ea84f671861eab447'
            ]);
        });
    }
}
