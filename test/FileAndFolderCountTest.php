<?php


use PHPUnit\Framework\TestCase;
use pvillareal\FileAndFolderCount;

class FileAndFolderCountTest extends TestCase
{
    public function testGetFoldersCount(): void
    {
        var_dump(getcwd() . "/src");
        $ffc = new FileAndFolderCount(getcwd() . "/src");
        $this->assertEquals(1, $ffc->getFolderCount());
    }

    public function testGetFilesCount(): void
    {
        $ffc = new FileAndFolderCount(getcwd() . "/src");
        $this->assertEquals(19, $ffc->getFilesCount());
    }
}
