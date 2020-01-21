<?php


namespace pvillareal;


class TwoNumberSum
{

    public function TwoNumberSum(array $nums, $total)
    {
        sort($nums);
        $result = [];
        $left = 0;
        $right = count($nums) - 1;
        while($left != $right) {
            $sum = $nums[$left] + $nums[$right];
            if ($sum === $total) {
               $result[] = $nums[$left];
               $result[] = $nums[$right];
               return $result;
            }
            if ($sum < $total) {
                $left++;
            }
            if ($sum > $total) {
                $right--;
            }
        }
        return $result;
    }
}