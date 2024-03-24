<?php

namespace pvillareal;

final class PalindromeWithExtraChar
{

    public function __invoke(string $str): bool
    {
        $startIndex = 0;
        $endIndex = strlen($str) - 1;
        $skips = 0;
        $str = strtolower($str);
        while ($startIndex < ceil(strlen($str) / 2) && $endIndex > floor(strlen($str) / 2)) {
            if ($str[$startIndex] == $str[$endIndex]) {
                $startIndex++;
                $endIndex--;
            } else {
                if ($str[$startIndex+1] == $str[$endIndex]) {
                    $startIndex++;
                }
                if ($str[$startIndex] == $str[$endIndex - 1]) {
                    $endIndex--;
                }
                $skips++;
            }
            if ($skips == 2) {
                break;
            }
        }
        return $skips < 2;
    }


}