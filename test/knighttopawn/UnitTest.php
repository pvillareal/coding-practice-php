<?php


use PHPUnit\Framework\TestCase;
use pvillareal\knighttopawn\Knight;
use pvillareal\knighttopawn\Unit;

class UnitTest extends TestCase
{


    /**
     * @var Unit
     */
    protected $unit;

    public function setup() : void
    {
        $this->unit = new Knight();
    }

    public function testUnitLocation(): void
    {
        $this->unit->move('a', '1');
        $loc = $this->unit->getLocation();
        $this->assertEquals('a', $loc[0]);
        $this->assertEquals('1', $loc[1]);
        $this->assertEquals(1, $this->unit->getPathSize());
        $this->unit->move('b', '3');
        $loc = $this->unit->getLocation();
        $this->assertEquals('b', $loc[0]);
        $this->assertEquals('3', $loc[1]);
        $this->assertEquals(2, $this->unit->getPathSize());
    }

}
