<?php


namespace pvillareal\knighttopawn;


use http\Exception\InvalidArgumentException;

class Board
{
    /**
     * @var array
     */
    protected $board;

    /**
     * Board constructor.
     */
    public function __construct()
    {
        $keys = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h'];
        $this->board = array_fill_keys($keys, array_fill(1, 8, null));
    }

    /**
     * @param Unit $unit
     * @param string $column
     * @param string $row
     * Moves a unit onto a position on the board
     * the board uses letters as columns and numbers as rows
     * @return Unit
     */
    public function move(Unit $unit, string $column, string $row)
    {
        $unit->move($column, $row);
        $this->board[$column][$row] = $unit;
        return $unit;
    }

    /**
     * @param string $column
     * @param string $row
     * @return Unit
     */
    public function check(string $column, string $row)
    {
        if (ord(strtolower($column)) < 97 || ord(strtolower($column)) > 104) {
            throw new \InvalidArgumentException("column must be from a to b");
        }
        if ($row < 1 || $row > 8) {
            throw new \InvalidArgumentException("row must be from 1 to 8");
        }
        return $this->board[$column][$row];
    }

    public function pick(string $column, string $row)
    {
        $unit = $this->check($column, $row);
        $this->board[$column][$row] = null;
        return $unit;
    }
}