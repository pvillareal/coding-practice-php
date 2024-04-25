<?php

namespace pvillareal;
class LRUCache {

    protected array $cache = [];
    protected array $lru = [];
    /**
     * @param Integer $capacity
     */
    function __construct(
        private $capacity
    )
    {
    }

    /**
     * @param Integer $key
     * @return bool|int
     */
    function get(int $key) : bool|int {
        if (array_key_exists($key, $this->cache)) {
            $this->pushKey($key);
            return $this->cache[$key];
        }
        return false;
    }

    /**
     * @param Integer $key
     * @param Integer $value
     */
    function put(int $key, int $value) : void {
        $removed = $this->pushKey($key);
        if ($removed !== false) {
            unset($this->cache[$removed]);
        }
        $this->cache[$key] = $value;
    }

    private function pushKey($key) {
        if (count($this->lru) < $this->capacity) {
            array_unshift($this->lru, $key);
            return false;
        }
        $lruKey = array_search($key, $this->lru);
        if ($lruKey !== false) {
            unset($this->lru[$lruKey]);
            array_unshift($this->lru, $key);
            return $this->cache[$this->lru[$lruKey]];
        } else {
            $lastKey = array_pop($this->lru);
            array_unshift($this->lru, $key);
            return $lastKey;
        }
    }
}