<?php

/**
* change plain number to formatted currency
*
* @param $number
* @param $currency
*/
function formatNumber($number, $currency = 'IDR') {
    if($currency == 'USD') {
        return number_format($number, 2, '.', ',');
    }
    return number_format($number, 0, '.', '.');
}

/**
 * Word translations
 * @param $key
 * @param $language
 */
function translate($key, $language = "es") {
    $e = new \App\Language;
    $word = $e::where("key", $key)->first();
    if ($word)
        return $word->option[$language];
    else
        return $key;
}