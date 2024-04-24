<?php


use pvillareal\FinalMockTest;
use PHPUnit\Framework\TestCase;

class FinalMockTestTest extends TestCase
{

    public function testMock()
    {
        DG\BypassFinals::enable();
        // Uses "dg/bypass-finals" to "hack/remove" final and readonly keywords
        // https://github.com/dg/bypass-finals/
        $mockFinalClass = $this->createStub(FinalMockTest::class);
        $mockFinalClass->method('getItem')->willReturn(2);
        self::assertTrue(2 == $mockFinalClass->getItem());
    }

    public function testFinalMockRealGetItem()
    {
        $finalMock = new FinalMockTest();
        self::assertTrue(1 == $finalMock->getItem());
    }

}
