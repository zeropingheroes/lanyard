<?php

if (!function_exists('lang')) {
    /**
     * Translate the given message.
     *
     * @param  string $key
     * @param  array $replace
     * @param  string $locale
     * @return string
     */
    function lang($key, $replace = [], $locale = null)
    {
        return __($key, $replace, $locale);
    }
}
