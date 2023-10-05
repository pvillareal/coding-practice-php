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
     * @return Integer
     */
    function get($key) {
        if (array_key_exists($key, $this->cache)) {
            $this->pushKey($key);
            return $this->cache[$key];
        }
        return -1;
    }

    /**
     * @param Integer $key
     * @param Integer $value
     * @return NULL
     */
    function put($key, $value) {
        $removed = $this->pushKey($key);
        if ($removed) {
            unset($this->cache[$removed]);
        }
        $this->cache[$key] = $value;
        return null;
    }

    private function pushKey($key) {
        if (count($this->lru) < $this->capacity) {
            array_unshift($this->lru, $key);
            return false;
        }
        $lruKey = array_search($key, $this->lru);
        if ($lruKey) {
            echo($lruKey);
            var_dump($this->lru);
            unset($this->lru[$lruKey]);
            array_unshift($this->lru, $key);
            return false;
        } else {
            $lastKey = array_pop($this->lru);
            array_unshift($this->lru, $key);
            return $lastKey;
        }
    }
}