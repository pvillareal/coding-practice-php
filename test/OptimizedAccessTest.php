<?php


use PHPUnit\Framework\TestCase;
use pvillareal\OptimizedAccess;

class OptimizedAccessTest extends TestCase
{
    public function testRemoveNoValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $os = new OptimizedAccess();
        $os->remove("a");
    }

    public function testAdd(): void
    {
        $oa = new OptimizedAccess();
        $oa->add("a");
        $oa->add("b");
        $oa->add("c");
        $this->assertEquals(["a", "b", "c"], $oa->getItems());
        $this->assertEquals(["a" => 0, "b" => 1, "c" => 2], $oa->getMap());
        $this->assertEquals("a", $oa->getItem("a"));
    }

    public function testRemove(): void
    {
        $oa = new OptimizedAccess();
        $oa->add("a");
        $oa->add("b");
        $oa->add("c");
        $oa->remove("b");
        $this->assertEquals(["a", "c"], $oa->getItems());
        $this->assertEquals(["a" => 0, "c" => 1], $oa->getMap());
    }

    public function testGetRandom(): void
    {
        $oa = new OptimizedAccess();
        $oa->add("a");
        $oa->add("b");
        $this->assertEquals("a", $oa->getItem("a"));
        $this->assertEquals("b", $oa->getItem("b"));
    }
}
