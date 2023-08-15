<?php


namespace pvillareal;


use FilesystemIterator;
use SplFileInfo;

class FileAndFolderCount
{


    /**
     * @var int
     */
    protected $folders = 0;
    /**
     * @var int
     */
    protected $files = 0;

    public function __construct($path)
    {
        $this->countItems($path);
    }

    private function countItems($path)
    {
        $rdi = new \FilesystemIterator($path, FilesystemIterator::SKIP_DOTS);
        /** @var SplFileInfo $file */
        foreach ($rdi as $file) {
            if ($file->isDir()) {
                $this->folders++;
                $this->countItems($file->getFilename());
            } else {
                $this->files++;
            }
        }
    }

    public function getFilesCount()
    {
        return $this->files;
    }

    public function getFolderCount()
    {
        return $this->folders;
    }

}