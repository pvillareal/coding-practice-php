<?php


use pvillareal\DirectoryString;
use PHPUnit\Framework\TestCase;

class DirectoryStringTest extends TestCase
{

    public function testMoveToFolderFromCurrent()
    {
        $ds = new DirectoryString();
        $test = $ds->getDirString("/", "hello");
        $this->assertEquals("/hello", $test);

        $test2 = $ds->getDirString("/hello", "world");
        $this->assertEquals("/hello/world", $test2);
    }

    public function testMoveToFolderOnBasePath()
    {
        $ds = new DirectoryString();
        $test = $ds->getDirString("/simple", "/hello");
        $this->assertEquals("/hello", $test);

        $test2 = $ds->getDirString("/hello/smile", "/hello/world");
        $this->assertEquals("/hello/world", $test2);
    }

    public function testMoveOneFolderUp()
    {
        $ds = new DirectoryString();
        $test = $ds->getDirString("/hello/world", "..");
        $this->assertEquals("/hello", $test);

        $test2 = $ds->getDirString("/hello/world", "../..");
        $this->assertEquals("/", $test2);

        $test3 = $ds->getDirString("/hello/world", "../../..");
        $this->assertEquals("/", $test3);
    }

    public function testCurrentFolder()
    {
        $ds = new DirectoryString();
        $test = $ds->getDirString("/hello/world", ".");
        $this->assertEquals("/hello/world", $test);

        $test2 = $ds->getDirString("/.", "/");
        $this->assertEquals("/", $test2);

        $test3 = $ds->getDirString("/", "/hello/./world");
        $this->assertEquals("/hello/world", $test3);
    }

}
