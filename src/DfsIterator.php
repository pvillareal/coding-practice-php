<?php


namespace pvillareal;


class DfsIterator implements \Iterator
{
    protected $current;
    protected $cache;
    protected $tree;
    protected $key = 0;

    public function __construct(Node $tree)
    {
        $this->current = $tree;
        $this->tree = $tree;
    }


    /**
     * Return the current element
     * @link https://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     * @since 5.0.0
     */
    public function current()
    {
        return $this->current;
    }

    /**
     * Move forward to next element
     * @link https://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function next()
    {
        if (!empty($this->current->getRight())) {
            $this->cache[] = $this->current->getRight();
        }
        if (empty($this->current->getLeft())) {
            $this->current = array_pop($this->cache);
        } else {
            $this->current = $this->current->getLeft();
        }
        $this->key++;
    }

    /**
     * Return the key of the current element
     * @link https://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     * @since 5.0.0
     */
    public function key()
    {
        return $this->key;
    }

    /**
     * Checks if current position is valid
     * @link https://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     * @since 5.0.0
     */
    public function valid()
    {
        return $this->current() != null;
    }

    /**
     * Rewind the Iterator to the first element
     * @link https://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function rewind()
    {
        $this->current = $this->tree;
    }
}