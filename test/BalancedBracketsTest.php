<?php


use PHPUnit\Framework\TestCase;
use pvillareal\BalancedBrackets;

class BalancedBracketsTest extends TestCase
{
    public function testBalanceBrackets(): void
    {
        $string = "(())(((())))";
        $bb = new BalancedBrackets($string);
        $this->assertTrue($bb->isBalanced());
    }

    public function testUnBalanceBrackets(): void
    {
        $string = "(())((())))";
        $bb = new BalancedBrackets($string);
        $this->assertFalse($bb->isBalanced());
    }

    public function testWhenStartMultipleOpenningBrackets(): void
    {
        $string = "]]";
        $bb = new BalancedBrackets($string);
        $this->assertFalse($bb->isBalanced());
    }

    public function testNotMatchingBrackets(): void
    {
        $string = "(]";
        $bb = new BalancedBrackets($string);
        $this->assertFalse($bb->isBalanced());
    }

    public function testDidNotCloseOneBracket(): void
    {
        $string = "(()";
        $bb = new BalancedBrackets($string);
        $this->assertFalse($bb->isBalanced());
    }
}
