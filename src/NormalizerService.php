<?php

namespace BoktosoEnterprise\NormalizeSpamPhoneNumbers;

/**
 * @class NormalizeService
 * @package NormalizeSpamPhoneNumbers
 * @vendor BoktosoEnterprise
 */
class NormalizerService
{
    /**
     * Normalize the string.
     *
     * @param string $string
     *
     * @return string|null
     */
    public static function normalizePhoneNumber(string $string): string|null
    {
        // Check if we have an empty string.
        if (empty($string)) {
            return null;
        }
        // Str to lower.
        $string = strtolower($string);
        // Replace all unwanted words to be integers.
        $string = strtr($string, Constants::STRINGS_TO_INTEGER);
        // Replace all regex characters to nothing to conform.
        return preg_replace('/[-_\'"`~#\W\\\\]*/', '', $string);
    }
}
