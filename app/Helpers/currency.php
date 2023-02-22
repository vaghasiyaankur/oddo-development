<?php

use AmrShawky\LaravelCurrency\Facade\Currency;
use App\Models\GeneralSetting;

if (!function_exists("removeWhiteSpace")) {

    /**
     * @return array<SomeConstants::*, mixed>
     */
    function currency()
    {
        $data = GeneralSetting::first();

        $currency = [
            'currency' => $data->currency,
            'sumbol' => $data->currency_symbol,
        ];

        return $currency;
    }

    /**
     * @param int $amount
     *
     * @return float
     */
    function exchange_rate($amount)
    {

        $data = GeneralSetting::first();
        $currency = Currency::convert()->from('USD')
            ->to($data->currency)
            ->get();

        $convert = round($currency, 2);

        return $amount * $convert;
    }
}
