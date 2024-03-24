<?php

namespace test;

use PHPUnit\Framework\TestCase;
use pvillareal\PalindromeWithExtraChar;

class PalindromeWithExtraCharTest extends TestCase
{

    public function testEightCharPalindrome()
    {
        $palindrome = new PalindromeWithExtraChar();
        self::assertTrue($palindrome("herddreh"));
        self::assertFalse($palindrome("herdherd"));
    }

    public function testThreeCharacterPalindrom()
    {
        $palindrome = new PalindromeWithExtraChar();
        self::assertTrue($palindrome("lol"));
        self::assertFalse($palindrome("rol"));
    }

    public function testFiveCharacterPalindrom()
    {
        $palindrome = new PalindromeWithExtraChar();
        self::assertTrue($palindrome("stoot"));
        self::assertFalse($palindrome("break"));
    }


}
