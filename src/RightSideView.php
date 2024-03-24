<?php


namespace pvillareal;


use \Iterator;

class RightSideView implements Iterator
{
    protected $current;
    protected $key = 0;
    /**
     * @var array|Node
     */
    protected $cache = array();
    /**
     * @var Node
     */
    protected $tree;
    protected $levels = array();
    protected $level = 0;
    protected $maxLevel = 0;

    /**
     * RightSideView constructor.
     * @param Node $tree
     */
    public function __construct(Node $tree)
    {
        $this->tree = $tree;
        $this->current = $tree;
    }

    /**
     * @inheritDoc
     * @return Node
     */
    public function current() : Node
    {
        return $this->current;
    }

    /**
     * @inheritDoc
     */
    public function next(): void
    {
        $this->level++;
        if (!empty($this->current->getLeft())) {
            $this->cache[] = $this->current->getLeft();
            $this->levels[] = $this->level;
        }
        if ($this->level > $this->maxLevel) {
            $this->maxLevel = $this->level;
        }
        if (empty($this->current->getRight())) {
            $this->current = array_pop($this->cache);
            $this->level = array_pop($this->levels);
        } else {
            $this->current = $this->current->getRight();
        }
        if ($this->level < $this->maxLevel && $this->current != null) {
            $this->next();
        }
        $this->key++;
    }

    /**
     * @inheritDoc
     */
    public function key() : int
    {
        return $this->key;
    }

    /**
     * @inheritDoc
     */
    public function valid() : bool
    {
        return !empty($this->current);
    }

    /**
     * @inheritDoc
     */
    public function rewind(): void
    {
        $this->key = 0;
        $this->current = $this->tree;
    }
}