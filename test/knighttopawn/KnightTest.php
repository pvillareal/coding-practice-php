<?php


use PHPUnit\Framework\TestCase;
use pvillareal\knighttopawn\Knight;

class KnightTest extends TestCase
{
    /**
     * @var Knight
     */
    protected $knight;

    public function setup() : void
    {
        $this->knight = new Knight();
    }

    public function testKnightLegalMoves()
    {
        $this->knight->move('a', '1');
        $this->assertContainsEquals(['b', '3'], $this->knight->getLegalMoves());
        $this->assertContainsEquals(['c', '2'], $this->knight->getLegalMoves());
        $this->assertCount(2, $this->knight->getLegalMoves());

        $this->knight->move('c', '3');
        $this->assertContainsEquals(['b', '5'], $this->knight->getLegalMoves());
        $this->assertContainsEquals(['d', '5'], $this->knight->getLegalMoves());
        $this->assertContainsEquals(['e', '4'], $this->knight->getLegalMoves());
        $this->assertContainsEquals(['e', '2'], $this->knight->getLegalMoves());
        $this->assertContainsEquals(['d', '1'], $this->knight->getLegalMoves());
        $this->assertContainsEquals(['b', '1'], $this->knight->getLegalMoves());
        $this->assertContainsEquals(['a', '2'], $this->knight->getLegalMoves());
        $this->assertContainsEquals(['a', '4'], $this->knight->getLegalMoves());
        $this->assertCount(8, $this->knight->getLegalMoves());
    }
}
