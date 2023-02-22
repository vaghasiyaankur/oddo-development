<?php

namespace Modules\UserSite\Database\Seeders;

use File;
use Illuminate\Database\Seeder;

class PaymentTableSeeder extends Seeder
{
    /**
     * Run the Payment seeds.
     *
     * @return void
     */
    public function run()
    {

        $Payments = [
            ['Paypal',
                'paymentGateway/paypal.png',
                'AaOFHm9cvyu_v8w-gRkli4cfh5ltjx7zjeC9BOOv8Q9Wd4uEEAhOesCFB0thnCV-eiX0AqCHDbWjrSJi',
                'EAkWlkraPbYJOqLofZ6ZUxEHBIgrAcDLCiKvQeWtICNkiQsPjrYjucqKC2yeUN4em-svKeH8m7JRq5uy',
                'AlUbKnK29hQu5gg23suU0myvzJzMA7LLy0RbLNz6wf5.JAxW3DjFapVP',
                'live_demo',
                'live_demo',
                'live_demo',
                '1',
                'test',
                'payment.paypal',
            ], ['Stripe',
                'paymentGateway/razorpay.png',
                'pk_test_51K9nWFSEHRtZ2j6i7laSxXbJpg25Y51cqGBjyWPOiXVlXOscQvsBupsHiN0xONkr2MDs1CsHBNni9wNvuNyNlb2k00HjvTADGG',
                'sk_test_51K9nWFSEHRtZ2j6imHtkYo3tz0lNjKpaPyoXlqXmO40NlEnOfQ2h1tA8LGMIPKYYUnB5vQTyQLZx4hmKlESakTsc00gewuPBjL',
                null,
                'live_demo',
                'live_demo',
                'live_demo',
                '1',
                'test',
                'payment.stripe',
            ], ['Razorpay',
                'paymentGateway/stripe.png',
                'rzp_test_ImnZdPCDKBmCSP',
                'vTX48Qk4Idt5gc49386hu3Ra',
                null,
                'live_demo',
                'live_demo',
                'live_demo',
                '1',
                'test',
                'payment.razorpay',
            ],
        ];

        $check_folder = is_dir(public_path('storage/paymentGateway'));
        if (!$check_folder) {
            mkdir(public_path('storage/paymentGateway'));
        }

        File::copy(public_path('storage/images/paypal.png'), public_path('storage/paymentGateway/paypal.png'));
        File::copy(public_path('storage/images/razorpay.png'), public_path('storage/paymentGateway/stripe.png'));
        File::copy(public_path('storage/images/stripe.png'), public_path('storage/paymentGateway/razorpay.png'));

        foreach ($Payments as list($paymentType, $payment_icon, $client_id, $client_key, $api_secret_key, $live_id, $live_key, $live_api, $status, $testMode, $route)) {
            \App\Models\PaymentGetways::create(
                [
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
                    'route' => $route,
                ]
            );
        }
    }
}
