<?php


use PHPUnit\Framework\TestCase;
use pvillareal\ThreeNumberSum;

class ThreeNumberSumTest extends TestCase
{

    public function testScenario1()
    {
        $array = [12,3,1,2,-6,5,-8,6];
        $total = 0;
        $tns = new ThreeNumberSum();
        $result = $tns->findTriplets($array, $total);
        $this->assertContainsEquals([-8, 2, 6], $result);
        $this->assertContainsEquals([-6, 1, 5], $result);
        $this->assertContainsEquals([-8, 3, 5], $result);
    }
}
