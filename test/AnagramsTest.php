<?php declare(strict_types=1);


use PHPUnit\Framework\TestCase;
use pvillareal\AnagramChecker;

final class AnagramsTest extends TestCase
{

    #[Test]
    public function testAnagrams(): void
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
