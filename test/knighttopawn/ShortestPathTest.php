<?php


use PHPUnit\Framework\TestCase;
use pvillareal\knighttopawn\Board;
use pvillareal\knighttopawn\Knight;
use pvillareal\knighttopawn\ShortestPath;

class ShortestPathTest extends TestCase
{

    /**
     * @var ShortestPath
     */
    protected $shortestPath;

    public function setup() : void
    {
        $this->shortestPath = new ShortestPath();
    }


    public function testShortPathKnight()
    {
        $board = new Board();
        $knight = new Knight();
        $this->shortestPath->setBoard($board);
        $this->shortestPath->setUnit($knight, 'a', '1');
        $this->shortestPath->setDestination('c', '2');
        $path = $this->shortestPath->find();
        $this->assertContainsEquals(['a', '1'], $path);
        $this->assertContainsEquals(['c', '2'], $path);
        $this->assertCount(2, $path);

        $board = new Board();
        $knight = new Knight();
        $this->shortestPath->setBoard($board);
        $this->shortestPath->setUnit($knight, 'b', '1');
        $this->shortestPath->setDestination('h', '5');
        $path = $this->shortestPath->find();
        $this->assertCount(5, $path);

        $board = new Board();
        $knight = new Knight();
        $this->shortestPath->setBoard($board);
        $this->shortestPath->setUnit($knight, 'b', '1');
        $this->shortestPath->setDestination('a', '1');
        $path = $this->shortestPath->find();
        $this->assertCount(4, $path);
    }

}
