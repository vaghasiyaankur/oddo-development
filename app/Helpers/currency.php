<?php

use App\Models\GeneralSetting;

if(!function_exists("removeWhiteSpace")){
    function currency(){
        $data = GeneralSetting::first();
        
        $currency = [
            'currency' => $data->currency,
            'sumbol' => $data->currency_symbol
        ];

        return $currency;
    }
}