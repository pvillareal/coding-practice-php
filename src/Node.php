<?php


namespace pvillareal;


class Node
{
    private $left = null, $right = null, $value = 0;

    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @param Node $left
     * @return Node
     */
    public function setLeft(Node $left): Node
    {
        $this->left = $left;
        return $this;
    }

    /**
     * @param Node $right
     * @return Node
     */
    public function setRight(Node $right): Node
    {
        $this->right = $right;
        return $this;
    }

    /**
     * @return Node
     */
    public function getLeft()
    {
        return $this->left;
    }

    /**
     * @return Node
     */
    public function getRight() : Node
    {
        return $this->right;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "$this->value";
    }
}