<?php


use PHPUnit\Framework\TestCase;
use pvillareal\GiveMeChange;

class GiveMeChangeTest extends TestCase
{

    public function testSimpleChange()
    {
        $value = 32;
        $denomination = [1,5,10];
        $giveMeChange = new GiveMeChange($value, $denomination);
        $result = $giveMeChange->giveChange();
        $this->assertEquals(3, $result[10]);
        $this->assertEquals(0, $result[5]);
        $this->assertEquals(2, $result[1]);
    }

    public function testCase1()
    {
        $value = 7;
        $denomination = [1,5,15];
        $giveMeChange = new GiveMeChange($value, $denomination);
        $result = $giveMeChange->giveChange();
        $this->assertEquals(0, $result[15]);
        $this->assertEquals(1, $result[5]);
        $this->assertEquals(2, $result[1]);
    }

}
