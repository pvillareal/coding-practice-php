<?php


use pvillareal\LRUCache;
use PHPUnit\Framework\TestCase;

class LRUCacheTest extends TestCase
{

    public function testPushMoreThanCapacity()
    {
        $lruCache = new LRUCache(5);
        $lruCache->put(0, 2);
        $lruCache->put(2, 4);
        $lruCache->put(3, 6);
        $lruCache->put(4, 8);
        $lruCache->put(5, 10);
        $lruCache->put(6, 12);
        self::assertFalse($lruCache->get(0));
        self::assertEquals(4, $lruCache->get(2));
        self::assertEquals(6, $lruCache->get(3));
        self::assertEquals(8, $lruCache->get(4));
        self::assertEquals(10, $lruCache->get(5));
        self::assertEquals(12, $lruCache->get(6));
    }

    public function testMostRecentCheckKeyDoesNotGetRemoved()
    {
        $lruCache = new LRUCache(3);
        $lruCache->put(0, 2);
        $lruCache->put(2, 4);
        $lruCache->put(3, 6);
        self::assertEquals(2, $lruCache->get(0), "Get the oldest item push, so that it goes back down the stack");
        $lruCache->put(4, 8);
        self::assertFalse($lruCache->get(2), "2 key gets removed");
        self::assertEquals(2, $lruCache->get(0), "0 key gets retained");
    }

}
