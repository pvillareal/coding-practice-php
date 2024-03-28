<?php


use pvillareal\IpParser;
use PHPUnit\Framework\TestCase;

class IpParserTest extends TestCase
{

    public array $array = [];

    public function setUp() : void
    {
        $this->array =  ["ssss dfassdfsdaf af 13:2312",
            "ip address 192.168.2.1/21",
            "ip address 192.168.2.2/21",
            "ip address 192.168.2.3/21"];
    }

    public function test__invoke()
    {
        $ipParser = new IpParser();
        $ips = $ipParser($this->array);
        self::assertContains('192.168.2.1', $ips);
        self::assertContains('192.168.2.2', $ips);
        self::assertContains('192.168.2.3', $ips);
        self::assertNotContains('13:2312', $ips);
    }
}
