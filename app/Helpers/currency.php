<?php

use App\Models\GeneralSetting;
use AmrShawky\LaravelCurrency\Facade\Currency;

if(!function_exists("removeWhiteSpace")){
    function currency(){
        $data = GeneralSetting::first();
        
        $currency = [
            'currency' => $data->currency,
            'sumbol' => $data->currency_symbol
        ];

        return $currency;
    }

    function exchange_rate($amount){

        $data = GeneralSetting::first();
        $currency = Currency::convert()->from('USD')
        ->to($data->currency)
        ->get();

        $convert = round($currency, 2);

        return $amount * $convert;
    }
}