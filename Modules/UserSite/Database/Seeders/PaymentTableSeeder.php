<?php

namespace Modules\UserSite\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\paymentGetways;
use Illuminate\Support\Facades\Storage;
use File;

class PaymentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $Payments = [
            ['Paypal',
            'paymentGateway/paypal.png',
            'AfnfdihnzP8TU_I0SyhrFRBUNgpa0Fn8YZgb473vmomEbo4hZdiExbXeKOsftOotFdxA3PPy-zMJd0aZ',
            'EBdsmhqAaUOe-S7lb4A2ifNqOCDGC3XBgMUf0fay-3X-A-2lVBb11a6NlCHJGSuTvUqqFrUB9KWJHguQ',
            'null',
            'live_demo',
            'live_demo',
            'live_demo',
            '1',
            'test',
            'payment.paypal'],

            ['Stripe',  
            'paymentGateway/razorpay.png',
            'pk_test_51K9nWFSEHRtZ2j6i7laSxXbJpg25Y51cqGBjyWPOiXVlXOscQvsBupsHiN0xONkr2MDs1CsHBNni9wNvuNyNlb2k00HjvTADGG',
            'sk_test_51K9nWFSEHRtZ2j6imHtkYo3tz0lNjKpaPyoXlqXmO40NlEnOfQ2h1tA8LGMIPKYYUnB5vQTyQLZx4hmKlESakTsc00gewuPBjL', 
            null,
            'live_demo',
            'live_demo',
            'live_demo',
            '1',
            'test',
            'payment.stripe'], 

            ['Razorpay',
            'paymentGateway/stripe.png',
            'rzp_test_ImnZdPCDKBmCSP',
            'vTX48Qk4Idt5gc49386hu3Ra',
            null,
            'live_demo',
            'live_demo',
            'live_demo',
            '1',
            'test',
            'payment.razorpay']
        ];

        File::copy(public_path('storage/images/paypal.png'), public_path('storage/paymentGateway/paypal.png'));
        File::copy(public_path('storage/images/razorpay.png'), public_path('storage/paymentGateway/stripe.png'));
        File::copy(public_path('storage/images/stripe.png'), public_path('storage/paymentGateway/razorpay.png'));

        foreach ($Payments as  list($paymentType, $payment_icon, $client_id, $client_key, $api_secret_key, $live_id, $live_key, $live_api, $status, $testMode, $route )) {
            paymentGetways::create([
                'payment_type' => $paymentType,
                'payment_icon' => $payment_icon,
                'test_client_id' => $client_id,
                'test_client_secret_key' => $client_key,
                'test_api_secret_key' => $api_secret_key,
                'live_client_id' => $live_id,
                'live_client_secret_key' => $live_key,
                'live_api_secret_key' => $live_api,
                'status' => $status,
                'mode' => $testMode,
                'route' => $route
            ]);
        }
    }
}
