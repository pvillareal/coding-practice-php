<?php


use PHPUnit\Framework\TestCase;
use pvillareal\BalancedBrackets;

class BalancedBracketsTest extends TestCase
{
    public function testBalanceBrackets()
    {
        $string = "(())(((())))";
        $bb = new BalancedBrackets($string);
        $this->assertTrue($bb->isBalanced());
    }

    public function testUnBalanceBrackets()
    {
        $string = "(())((())))";
        $bb = new BalancedBrackets($string);
        $this->assertFalse($bb->isBalanced());
    }

    public function testWhenStartMultipleOpenningBrackets()
    {
        $string = "]]";
        $bb = new BalancedBrackets($string);
        $this->assertFalse($bb->isBalanced());
    }

    public function testNotMatchingBrackets()
    {
        $string = "(]";
        $bb = new BalancedBrackets($string);
        $this->assertFalse($bb->isBalanced());
    }

    public function testDidNotCloseOneBracket()
    {
        $string = "(()";
        $bb = new BalancedBrackets($string);
        $this->assertFalse($bb->isBalanced());
    }
}
