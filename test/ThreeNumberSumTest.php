<?php


use PHPUnit\Framework\TestCase;
use pvillareal\ThreeNumberSum;

class ThreeNumberSumTest extends TestCase
{

    public function testScenario1(): void
    {
        $array = [12,3,1,2,-6,5,-8,6];
        $total = 0;
        $tns = new ThreeNumberSum();
        $result = $tns->findTriplets($array, $total);
        $this->assertContainsEquals([-8, 2, 6], $result);
        $this->assertContainsEquals([-6, 1, 5], $result);
        $this->assertContainsEquals([-8, 3, 5], $result);
    }

    public function testScenario2(): void
    {
        $array = [12,1,0,-12,-6,5,-5,6];
        $total = 1;
        $tns = new ThreeNumberSum();
        $result = $tns->findTriplets($array, $total);
        $this->assertContainsEquals([-5, 1, 5], $result);
        $this->assertContainsEquals([-6, 1, 6], $result);
        $this->assertContainsEquals([-12, 1, 12], $result);
    }
}
