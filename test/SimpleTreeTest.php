<?php


use PHPUnit\Framework\TestCase;
use pvillareal\BfsIterator;
use pvillareal\BreadthFirstSearchIterator;
use pvillareal\DepthFirstSearchIterator;
use pvillareal\DfsIterator;
use pvillareal\Node;

class SimpleTreeTest extends TestCase
{
    protected $tree = null;

    protected function setUp(): void
    {
        //          5
        //        /    \
        //       2      9
        //     /  \    / \
        //    1    4  8  11
        //        /
        //       3
        $main = new Node(5);
        $main->setLeft(new Node(2))->setRight(new Node(9));
        $main->getLeft()->setLeft(new Node(1))->setRight(new Node(4));
        $main->getRight()->setLeft(new Node(8))->setRight(new Node(11));
        $main->getLeft()->getRight()->setLeft(new Node(3));
        $this->tree = $main;
    }

    public function testBreadthFirstSearchIterator()
    {
        $bfs = new BreadthFirstSearchIterator($this->tree);
        $result = [];
        /** @var Node $node */
        foreach ($bfs as $node) {
            $result[] = $node->getValue();
        }
        $resultString = implode(",", $result);
        $this->assertEquals("5,2,9,1,4,8,11,3", $resultString);
    }

    public function testBfsIterator()
    {
        $bfs = new BfsIterator($this->tree);
        $result = [];
        /** @var Node $node */
        foreach ($bfs as $node) {
            $result[] = $node->getValue();
        }
        $resultString = implode(",", $result);
        $this->assertEquals("5,2,9,1,4,8,11,3", $resultString);
    }

    public function testDepthFirstSearchIterator()
    {
        $dfs = new DepthFirstSearchIterator($this->tree);
        $result = [];
        /** @var Node $node */
        foreach ($dfs as $node) {
            $result[] = $node->getValue();
        }
        $resultString = implode(",", $result);
        $this->assertEquals("5,2,1,4,3,9,8,11", $resultString);
    }

    public function testDfsIterator()
    {
        $dfs = new DfsIterator($this->tree);
        $result = [];
        /** @var Node $node */
        foreach ($dfs as $node) {
            $result[] = $node->getValue();
        }
        $resultString = implode(",", $result);
        $this->assertEquals("5,2,1,4,3,9,8,11", $resultString);
    }
}
