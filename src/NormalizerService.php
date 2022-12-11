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
   * Normalize the string
   *
   * @param $string
   *
   * @return string|null
   */
  public static function normalizePhoneNumber($string): string|null
  {
    // Lower string.
    $string = strtolower($string);
    // Check if we have spaces.
    if (str_contains($string, ' ')) {
      // Split on the spaces.
      $arr = explode(' ', $string);
    } else {
      $arr = str_split($string);
    }
    foreach ($arr as $k => $i) {
      if (array_key_exists($i, Constants::STRINGS_TO_INTEGER)) {
        $arr[$k] = Constants::STRINGS_TO_INTEGER[$i];
      }
    }
    $string = implode('', $arr);
    // Reloop through the Strings to Integers to find and replace all from there.
    foreach (Constants::STRINGS_TO_INTEGER as $k => $int) {
      $string = str_replace($k, $int, $string);
    }
    // Remove unwanted characters entirely.
    // Match any white-space character and the following:
    // - _ \ / # ' " ~ `
    $string = preg_replace('/[-_\'"`~#\W\\\\]*/', '', $string);
    if (is_array($string)) {
      $string = implode('', $string);
    }
    return $string;
  }

}