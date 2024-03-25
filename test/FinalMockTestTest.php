<?php


use pvillareal\FinalMockTest;
use PHPUnit\Framework\TestCase;

class FinalMockTestTest extends TestCase
{

    public function testMock()
    {
        // Uses "dg/bypass-finals" to "hack/remove" final and readonly keywords used by https://tester.nette.org/en/
        $mockFinalClass = $this->createStub(FinalMockTest::class);
        $mockFinalClass->method('getItem')->willReturn(2);
        self::assertTrue(2 == $mockFinalClass->getItem());
    }

}
