<?php

/**
 * @description function to generate random string with an underscore in between
 * @param string $codeType string to pass as 2nd param to random_string() e.g. alnum, numeric
 * @param int $minLength minimum length of string to generate
 * @param int $maxLength maximum length of string to generate
 * @param string $delimiter [optional] The string to put in between the first and second strings Default is underscore
 * @return string $code the new randomly generated code
 */
function generateRandomCode($codeType, $minLength, $maxLength, $delimiter = "_")
{
    $totLength = rand($minLength, $maxLength - 1);

    $b4_ = rand(1, $totLength - 1); //number of strings before the underscore
    $afta_ = $totLength - $b4_; //number of strings after the underscore

    $code = random_string($codeType, $b4_) . $delimiter . random_string($codeType, $afta_);

    return $code;
}
