<?php


use pvillareal\OptimizedAccess;

class OptimizedAccessTest extends \PHPUnit\Framework\TestCase
{
    public function testRemoveNoValue(): void
    {
        $this->expectException(\InvalidArgumentException::class);
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

    /**
     * This test has a 1/1024 odds of failing due to the random generator
     */
    public function testRemove(): void
    {
        $oa = new OptimizedAccess();
        $oa->add("a");
        $oa->add("b");
        $oa->add("c");
        $oa->remove("b");
        $aIsFound = false;
        $bIsFound = false;
        $cIsFound = false;
        foreach(range(0, 10) as $i) {
            $letter = $oa->getRandom();
            if ($letter === 'a') {
                $aIsFound = true;
            }
            if ($letter === 'b') {
                $bIsFound = true;
            }
            if ($letter === 'c') {
                $cIsFound = true;
            }
            echo("$letter is found" . PHP_EOL);
            if ($bIsFound) {
                break;
            }
        }
        $this->assertEquals(["a", "c"], $oa->getItems());
        $this->assertEquals(["a" => 0, "c" => 1], $oa->getMap());
        $this->assertTrue($aIsFound && !$bIsFound && $cIsFound);
    }

    /**
     * This test has a 1/1024 odds of failing due to the random generator
     */
    public function testGetRandom(): void
    {
        $oa = new OptimizedAccess();
        $oa->add("a");
        $oa->add("b");
        $aIsFound = false;
        $bIsFound = false;
        foreach(range(0, 10) as $i) {
            $letter = $oa->getRandom();
            if ($letter === 'a') {
                $aIsFound = true;
            }
            if ($letter === 'b') {
                $bIsFound = true;
            }
            echo("$letter is found" . PHP_EOL);
            if ($aIsFound && $bIsFound) {
                break;
            }
        }
        $this->assertTrue($aIsFound && $bIsFound);
    }
}
