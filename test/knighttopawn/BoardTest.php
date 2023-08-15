<?php

use PHPUnit\Framework\TestCase;
use pvillareal\knighttopawn\Board;
use pvillareal\knighttopawn\Knight;
use pvillareal\knighttopawn\Unit;

class BoardTest extends TestCase
{
    private $board;

    public function setUp() : void
    {
        $this->board = new Board();
    }
    
    public function testBoardExists()
    {
        $this->assertInstanceOf('pvillareal\knighttopawn\Board', $this->board);
    }

    public function testCheckBoardGrid()
    {
        $columns = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h'];
        foreach ($columns as $column) {
            for($row = 1; $row <= 8; $row++) {
                $this->assertEmpty($this->board->check($column, $row));
            }
        }
    }

    /**
     * @depends testCheckBoardGrid
     */
    public function testBoardBoundsColumn()
    {
        $this->expectExceptionObject(new InvalidArgumentException("column must be from a to b"));
        $this->board->check('i', 1);
    }

    /**
     * @depends testCheckBoardGrid
     */
    public function testBoardBoundsRow()
    {
        $this->expectExceptionObject(new InvalidArgumentException("row must be from 1 to 8"));
        $this->board->check('a', 0);
    }

    /**
     * @depends testCheckBoardGrid
     */
    public function testBoardMove()
    {
        $this->board->move(new Knight(), 'a', '1');
        $this->assertInstanceOf(Unit::class, $this->board->check('a', '1'));
    }

    /**
     * @depends testBoardMove
     */
    public function testBoardPick()
    {
        $this->board->move(new Knight(), 'a', '1');
        $this->assertInstanceOf(Unit::class, $this->board->pick('a', '1'));
        $this->assertEmpty($this->board->check('a', '1'));
    }

}
