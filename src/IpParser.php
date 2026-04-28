<?php

namespace pvillareal;

class IpParser
{

    public function __invoke(array $strings) : array
    {
        $results = [];
        foreach ($strings as $string) {
            $matches = [];
            $numberOfMatch = preg_match_all("(\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3})", $string, $matches);
            if ($numberOfMatch !== 0 && $numberOfMatch !== false) {
                foreach ($matches as $match) {
                    $results[] = $match[0];
                }
            }
        }
        return $results;
    }


}