<?php


namespace pvillareal;


class TwoNumberSum
{

    public function TwoNumberSum(array $nums, $total)
    {
        $result = [];
        $left = 0;
        $right = count($nums) - 1;
        while($left != $right) {
            if ($nums[$left] + $nums[$right] === $total) {
               $result[] = $nums[$left];
               $result[] = $nums[$right];
               return $result;
            }
            $left++;
            $right--;
        }
        return $result;
    }
}