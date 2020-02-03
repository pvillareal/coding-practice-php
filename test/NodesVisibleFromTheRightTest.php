<?php


use PHPUnit\Framework\TestCase;
use pvillareal\Node;
use pvillareal\RightSideView;

class NodesVisibleFromTheRightTest extends TestCase
{

    /**
     * @var Node
     */
    protected $tree;

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

    public function testVisible()
    {
        $rightView = new RightSideView($this->tree);
        $result = [];
        /** @var Node $node */
        foreach ($rightView as $node) {
            $result[] = $node->getValue();
        }
        $resultString = implode(",", $result);
        $this->assertEquals("5,9,11,3", $resultString);
    }

}
