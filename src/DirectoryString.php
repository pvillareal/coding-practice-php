<?php

namespace pvillareal;

class DirectoryString
{

    public function getDirString(string $cwd, string $loc) : string
    {
        $cwdStack = ($loc[0] === '/') ? [] : explode('/', $cwd);
        $cwdStack = array_filter($cwdStack);
        $locStack = explode('/', $loc);
        $locStack = array_filter($locStack);

        while(!empty($locStack)) {
            $dir = array_shift($locStack);
            if ($dir === '.') {
                continue;
            }
            if ($dir === '..') {
                if (!empty($cwdStack)) {
                    array_pop($cwdStack);
                }
                continue;
            }
            $cwdStack[] = $dir;
        }
        $resp = implode('/', $cwdStack);
        return empty($resp) ? "/" : "/$resp";
    }

}