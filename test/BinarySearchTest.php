<?php


use PHPUnit\Framework\TestCase;
use pvillareal\BinarySearch;

class BinarySearchTest extends TestCase
{
    private $test;

    protected function setUp(): void
    {
        $this->test = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
    }

    public function testIndexZero()
    {
        $findIndex = new BinarySearch(0, $this->test);
        $this->assertEquals(3, $findIndex->getCycles());
        $this->assertEquals(0, $findIndex->getIndex());
    }

    public function testIndexTen()
    {
        $findIndex = new BinarySearch(9, $this->test);
        $this->assertEquals(4, $findIndex->getCycles());
        $this->assertEquals(9, $findIndex->getIndex());
    }

    public function testIndexOne()
    {
        $findIndex = new BinarySearch(1, $this->test);
        $this->assertEquals(2, $findIndex->getCycles());
        $this->assertEquals(1, $findIndex->getIndex());
    }

    public function testIndexTwo()
    {
        $findIndex = new BinarySearch(2, $this->test);
        $this->assertEquals(3, $findIndex->getCycles());
        $this->assertEquals(2, $findIndex->getIndex());
    }

    public function testIndexThree()
    {
        $findIndex = new BinarySearch(3, $this->test);
        $this->assertEquals(4, $findIndex->getCycles());
        $this->assertEquals(3, $findIndex->getIndex());
    }

    public function testIndexFour()
    {
        $findIndex = new BinarySearch(4, $this->test);
        $this->assertEquals(1, $findIndex->getCycles());
        $this->assertEquals(4, $findIndex->getIndex());
    }

    public function testIndexFive()
    {
        $findIndex = new BinarySearch(5, $this->test);
        $this->assertEquals(3, $findIndex->getCycles());
        $this->assertEquals(5, $findIndex->getIndex());
    }

    public function testIndexSix()
    {
        $findIndex = new BinarySearch(6, $this->test);
        $this->assertEquals(4, $findIndex->getCycles());
        $this->assertEquals(6, $findIndex->getIndex());
    }
}
