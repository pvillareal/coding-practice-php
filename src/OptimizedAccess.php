<?php


namespace pvillareal;


/**
 * Class OptimizedAccess
 * @package pvillareal
 * This is a class that accesses the array in a constant time instead of the usual O of N time
 * it uses a trick of using a map where its key is the item and the value is the index on the item on the array
 * @example
 * $items =  ["a", "b", "c"];
 * $map = ["a" => 0, "b" => 1, "c" => 2];
 */
class OptimizedAccess
{
    protected $map = [];
    protected $items = [];

    public function add($item)
    {
        $this->items[] = $item;
        $this->map[$item] = count($this->items) - 1;
    }

    public function remove($item)
    {
        if (!array_key_exists($item, $this->map)) {
            throw new \InvalidArgumentException();
        }
        $index = $this->map[$item];
        unset($this->map[$item]);
        unset($this->items[$index]);
        $lastItem = array_pop($this->items);
        unset($this->map[$lastItem]);
        $this->items[$index] = $lastItem;
        $this->map[$lastItem] = $index;

    }

    public function getRandom() {
        $index = rand(0, count($this->items) - 1);
        return $this->items[$index];
    }

    public function getItem($item)
    {
        return $this->items[$this->map[$item]];
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @return array
     */
    public function getMap(): array
    {
        return $this->map;
    }
}