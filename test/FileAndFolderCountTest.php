<?php


use PHPUnit\Framework\TestCase;
use pvillareal\FileAndFolderCount;

class FileAndFolderCountTest extends TestCase
{
    public function testGetFoldersCount(): void
    {
        $ffc = new FileAndFolderCount(  BASE_PATH . "/src");
        $this->assertEquals(1, $ffc->getFolderCount());
    }

    public function testGetFilesCount(): void
    {
        $ffc = new FileAndFolderCount(BASE_PATH . "/src");
        $this->assertEquals(24, $ffc->getFilesCount());
    }
}
