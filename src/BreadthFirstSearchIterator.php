<?php


namespace pvillareal;


class BreadthFirstSearchIterator implements \Iterator
{

    protected $current;
    protected $map = [];
    protected $key = 0;

    /**
     * BreadthFirstSearchIterator constructor.
     * @param Node|null $tree
     */
    public function __construct(Node $tree)
    {
        $temp = [];
        $temp[] = $tree;
        while($temp !== []) {
            $node = array_shift($temp);
            /** @var Node $node */
            $this->map[] = $node;
            if (!empty($node->getLeft())) {
                $temp[] = $node->getLeft();
            }
            if (!empty($node->getRight())) {
                $temp[] = $node->getRight();
            }
        }
    }

    /**
     * Return the current element
     * @link https://php.net/manual/en/iterator.current.php
     * @return Node Can return any type.
     * @since 5.0.0
     */
    public function current()
    {
        return $this->map[$this->key()];
    }

    /**
     * Move forward to next element
     * @link https://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function next(): void
    {
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
        return $this->key() < count($this->map);
    }

    /**
     * Rewind the Iterator to the first element
     * @link https://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function rewind(): void
    {
        $this->key = 0;
    }
}