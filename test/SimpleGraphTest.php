<?php


use PHPUnit\Framework\TestCase;
use pvillareal\SimpleGraph;

class SimpleGraphTest extends TestCase
{

    public function testGetGraphs()
    {
        $sg = new SimpleGraph([
           ['item1', 'item2'], ['item3', 'item4'], ['item4', 'item5'], ['item5', 'item6']
        ]);
        $this->assertCount(2, $sg->getGraphs(), "Output: " . count($sg->getGraphs()));
        $this->assertContains(['item3', 'item4', 'item5', 'item6'], $sg->getGraphs());
    }
}
