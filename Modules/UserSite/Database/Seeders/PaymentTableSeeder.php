<?php

namespace Modules\UserSite\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\paymentGetways;

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
            ['stripe',  
            'pk_test_51K9nWFSEHRtZ2j6i7laSxXbJpg25Y51cqGBjyWPOiXVlXOscQvsBupsHiN0xONkr2MDs1CsHBNni9wNvuNyNlb2k00HjvTADGG',
            'pk_test_51K9nWFSEHRtZ2j6i7laSxXbJpg25Y51cqGBjyWPOiXVlXOscQvsBupsHiN0xONkr2MDs1CsHBNni9wNvuNyNlb2k00HjvTADGG', 
            '1',
            '1']
        ];

        foreach ($Payments as  list($paymentType, $client_id, $client_key , $status, $testMode )) {
            paymentGetways::create([
                'payment_type' => $paymentType,
                'client_id' => $client_id,
                'client_secret_key' => $client_key,
                'status' => $status,
                'test_mode' => $testMode
            ]);
        }

    }
}
