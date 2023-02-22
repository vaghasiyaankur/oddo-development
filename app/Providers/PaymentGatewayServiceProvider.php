<?php

namespace App\Providers;

use App\Models\PaymentGetways;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class PaymentGatewayServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if (Schema::hasTable('payment_getways')) {
            $paymentGetways = PaymentGetways::get();

            if ($paymentGetways) {
                foreach ($paymentGetways as $key => $paymentGetway) {

                    if ($paymentGetway->payment_type == 'Paypal') {
                        Config::set('paypal.sandbox.client_id', $paymentGetway->test_client_id);
                        Config::set('paypal.sandbox.client_secret', $paymentGetway->test_client_secret_key);
                    } elseif ($paymentGetway->payment_type == 'Stripe') {
                        Config::set('services.stripe.key', $paymentGetway->test_client_id);
                        Config::set('services.stripe.secret', $paymentGetway->test_client_secret_key);
                    } else {
                        Config::set('services.razorpay.key', $paymentGetway->test_client_id);
                        Config::set('services.razorpay.secret', $paymentGetway->test_client_secret_key);
                    }
                }
            }
        }
    }
}
