<?php


use PHPUnit\Framework\TestCase;
use pvillareal\FileAndFolderCount;

class FileAndFolderCountTest extends TestCase
{
    public function testGetFoldersCount()
    {
        $ffc = new FileAndFolderCount("../src/");
        $this->assertEquals(1, $ffc->getFolderCount());
    }

    public function testGetFilesCount()
    {
        $ffc = new FileAndFolderCount("../src/");
        $this->assertEquals(18, $ffc->getFilesCount());
    }
}
