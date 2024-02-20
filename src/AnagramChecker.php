<?php


namespace pvillareal;


class AnagramChecker
{

    public function check(string $word, array $list)
    {
        $wordSplit = str_split($word);
        sort($wordSplit);
        $result = [];
        foreach ($list as $anagram) {
            $anagramSplit = str_split($anagram);
            sort($anagramSplit);
            if ($wordSplit === $anagramSplit) {
                $result[] = $anagram;
            }
        }
        return $result;
    }
}