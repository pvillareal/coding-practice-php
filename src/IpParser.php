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
            if (!empty($numberOfMatch)) {
                foreach ($matches as $match) {
                    $results[] = $match[0];
                }
            }
        }
        return $results;
    }


}