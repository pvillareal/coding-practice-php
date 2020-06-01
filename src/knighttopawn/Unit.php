<?php


namespace pvillareal\knighttopawn;


abstract class Unit
{
    protected $name;
    /**
     * @var array
     */
    protected $path = [];

    public function move(string $column, string $row)
    {
        $this->path[] = [$column, $row];
    }

    public function getLocation()
    {
        return $this->path[$this->getPathSize() - 1];
    }

    public function getPathSize()
    {
        return count($this->path);
    }

    public function getPath()
    {
        return $this->path;
    }

    /**
     * @return array
     */
    abstract public function getLegalMoves() : array;
}