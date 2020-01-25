<?php


namespace pvillareal;


class ThreeNumberSum
{

    public function findTriplets(array $array, int $total)
    {
        sort($array);
        $result = array();
        for ($i = 0; $i < count($array) - 2; $i++) {
            $left = $i + 1;
            $right = count($array) - 1;
            while ($left < $right) {
                $value = $array[$i] + $array[$left] + $array[$right];
                if ($value === $total) {
                    $result[] = [$array[$i], $array[$left], $array[$right]];
                    $right--;
                    $left++;
                }
                if ($value > $total) {
                    $right--;
                }
                if ($value < $total) {
                    $left++;
                }
            }
        }
        return $result;
    }
}