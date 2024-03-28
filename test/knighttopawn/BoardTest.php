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
    
    public function testBoardExists(): void
    {
        $this->assertInstanceOf('pvillareal\knighttopawn\Board', $this->board);
    }

    public function testCheckBoardGrid(): void
    {
        $columns = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h'];
        foreach ($columns as $column) {
            for($row = 1; $row <= 8; $row++) {
                $this->assertEmpty($this->board->check($column, $row));
            }
        }
    }

    public function testBoardBoundsColumn(): void
    {
        $this->expectExceptionObject(new InvalidArgumentException("column must be from a to b"));
        $this->board->check('i', 1);
    }

    public function testBoardBoundsRow(): void
    {
        $this->expectExceptionObject(new InvalidArgumentException("row must be from 1 to 8"));
        $this->board->check('a', 0);
    }

    public function testBoardMove(): void
    {
        $this->board->move(new Knight(), 'a', '1');
        $this->assertInstanceOf(Unit::class, $this->board->check('a', '1'));
    }

    public function testBoardPick(): void
    {
        $this->board->move(new Knight(), 'a', '1');
        $this->assertInstanceOf(Unit::class, $this->board->pick('a', '1'));
        $this->assertEmpty($this->board->check('a', '1'));
    }

}
