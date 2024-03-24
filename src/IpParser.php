<?php

namespace pvillareal;

class IpParser
{
    public function __construct(
        protected array $strings = ["ssss dfassdfsdaf af 13:2312", "ip address 192.168.2.1/21", "ip address 192.168.2.2/21", "ip address 192.168.2.3/21"],
    )
    {
    }


    public function __invoke()
    {
        $results = [];
        foreach ($this->strings as $string) {
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