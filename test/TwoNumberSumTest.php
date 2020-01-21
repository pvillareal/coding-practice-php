<?php

use PHPUnit\Framework\TestCase;
use pvillareal\TwoNumberSum;

class TwoNumberSumTest extends TestCase
{
    public function testWhenNoValuesSumToTotal()
    {
        $tns = new TwoNumberSum();
        $nums = [3, 5, 4, 2, 9, 1, 7];
        $total = 20;
        $this->assertEmpty($tns->TwoNumberSum($nums, $total));
    }

    public function testCase1()
    {
        $tns = new TwoNumberSum();
        $nums = [3, 5, 4, 2, 9, 1, 7];
        $total = 10;
        $result = $tns->TwoNumberSum($nums, $total);
        $this->assertIsArray($result);
        $this->assertContains(1, $result);
        $this->assertContains(9, $result);
    }

    public function testCase2()
    {
        $tns = new TwoNumberSum();
        $nums = [3, 5, 4, 2, 9, 7, 11];
        $total = 10;
        $result = $tns->TwoNumberSum($nums, $total);
        $this->assertIsArray($result);
        $this->assertContains(3, $result);
        $this->assertContains(7, $result);
    }
}
