<?php

if (!function_exists('activeRoute')) {
    function activeRoute($route)
    {
        return request()->routeIs($route) ? 'active' : '';
    }
}

if (!function_exists('current_currency')) {
    function current_currency()
    {
        return session()->get('currency', 'USD');
    }
}

if (!function_exists('format_price')) {
    function format_price($price)
    {
        $currency = current_currency();
        $rates = [
            'USD' => 1,
            'SAR' => 3.75,
            'PKR' => 280,
        ];

        $symbols = [
            'USD' => '$',
            'SAR' => 'SAR ',
            'PKR' => 'Rs ',
        ];

        $rate = $rates[$currency] ?? 1;
        $symbol = $symbols[$currency] ?? '$';

        $converted_price = (float)$price * $rate;

        return $symbol . number_format($converted_price, 2);
    }
}
