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
            'sb-nrb6a16324783_api1.business.example.com',
            'YUQZV5HF9EWC433X',
            'AlUbKnK29hQu5gg23suU0myvzJzMA7LLy0RbLNz6wf5.JAxW3DjFapVP',
            '1',
            '1'],

            ['Stripe',  
            'paymentGateway/razorpay.png',
            'pk_test_51K9nWFSEHRtZ2j6i7laSxXbJpg25Y51cqGBjyWPOiXVlXOscQvsBupsHiN0xONkr2MDs1CsHBNni9wNvuNyNlb2k00HjvTADGG',
            'sk_test_51K9nWFSEHRtZ2j6imHtkYo3tz0lNjKpaPyoXlqXmO40NlEnOfQ2h1tA8LGMIPKYYUnB5vQTyQLZx4hmKlESakTsc00gewuPBjL', 
            null,
            '1',
            '1'], 

            ['Razorpay',
            'paymentGateway/stripe.png',
            'rzp_test_ImnZdPCDKBmCSP',
            'vTX48Qk4Idt5gc49386hu3Ra',
            null,
            '1',
            '1']
        ];

        File::copy(public_path('storage/images/paypal.png'), public_path('storage/paymentGateway/paypal.png'));
        File::copy(public_path('storage/images/razorpay.png'), public_path('storage/paymentGateway/razorpay.png'));
        File::copy(public_path('storage/images/stripe.png'), public_path('storage/paymentGateway/stripe.png'));

        foreach ($Payments as  list($paymentType, $payment_icon, $client_id, $client_key, $api_secret_key, $status, $testMode )) {
            paymentGetways::create([
                'payment_type' => $paymentType,
                'payment_icon' => $payment_icon,
                'client_id' => $client_id,
                'client_secret_key' => $client_key,
                'api_secret_key' => $api_secret_key,
                'status' => $status,
                'test_mode' => $testMode
            ]);
        }

    }
}
