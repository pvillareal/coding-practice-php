<?php


use PHPUnit\Framework\TestCase;
use pvillareal\AnagramChecker;

class AnagramsTest extends TestCase
{

    public function testAnagrams()
    {
        $word = "post";
        $list = ["time", "pot", "stroke", "muck", "spot", "tos", "opts", "close", "tops", "pots"];
        $ac = new AnagramChecker();
        $result = $ac->check($word, $list);
        $this->assertContains("spot", $result);
        $this->assertContains("opts", $result);
        $this->assertContains("tops", $result);
        $this->assertContains("pots", $result);
        $this->assertCount(4, $result);
    }

}
